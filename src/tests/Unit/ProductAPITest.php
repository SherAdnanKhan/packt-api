<?php

namespace Tests\Unit;

use App\Models\CompanyProduct;
use App\Models\CompanyUser;
use App\Models\UserPermission;
use App\Models\UserProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ProductAPITest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use WithFaker, RefreshDatabase;

    /**
     * @var $headers array headers for API requests
     */
    protected array $headers;


    public function test_it_can_retrieve_all_products()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->get(
            route('products.index'),
            $this->headers
        );

        $response->assertStatus(200);
        $response->assertJson([
            'products' => true
        ]);
    }

    public function test_it_throws_errors_if_cant_retrieve_all_products()
    {
        Config::set('app.algolia_id', 'throwanerror');

        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('products.index'),
            $this->headers
        );

        $response->assertNotFound();

    }

    public function test_it_can_get_one_product_by_sku()
    {

        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('products.show', ['product' => '9781789956177']),
            $this->headers
        );

        $response->assertStatus(200);
        $response->assertJson([
            'id' => 9781789956177
        ]);
    }

    public function test_it_throws_404_if_product_summary_is_not_available()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('products.show', ['product' => '978178995617']),
            $this->headers
        );
        $response->assertNotFound();
    }

    public function test_it_can_retrieve_a_large_cover_image()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('coverImages', ['sku' => '9781789956177', 'size' => 'large']),
            $this->headers
        );

        $response->assertStatus(200);
    }

    public function test_it_can_retrieve_a_small_cover_image()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('coverImages', ['sku' => '9781789956177', 'size' => 'small']),
            $this->headers
        );
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'image/jpeg');
    }

    public function test_it_returns_error_if_no_large_cover_image_found()
    {
        $this->withExceptionHandling();

        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('coverImages', ['sku' => '9781789956175', 'size' => 'large']),
            $this->headers
        );

        $response->assertNotFound();
    }

    public function test_it_returns_error_if_no_small_cover_image_found()
    {
        $this->withExceptionHandling();
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('coverImages', ['sku' => '9781789956175', 'size' => 'small']),
            $this->headers
        );
        $response->assertNotFound();
    }

    public function test_it_can_retrieve_author_details_by_sku()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('productAuthors', ['sku' => 9781789956177]),
            $this->headers
        );

        $response->assertStatus(200);
    }

    public function test_it_returns_404_if_no_author_found_for_sku()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('productAuthors', ['sku' => 9781789956174]),
            $this->headers
        );

        $response->assertNotFound();
    }

    public function test_it_can_provide_content_deliverables_by_product_sku_if_user_has_entitlement_access()
    {
        $sku = '9780470185483';
        $user = $this->createUserAndToken(['PI', 'CONTENT']);

        UserProduct::factory()->create([
            'user_id' => $user->id,
            'product_id' => $sku
        ]);

        $response = $this->get(
            route('productFiles', ['sku' => $sku, 'type' => 'epub']),
            $this->headers
        );
        $response->assertStatus(200);
    }

    public function test_it_can_provide_content_deliverables_by_product_sku_if_company_has_entitlement_access()
    {
        $sku = '9780470185483';
        $user = $this->createUserAndToken(['PI', 'CONTENT']);

        $companyUser = CompanyUser::factory()->create([
            'user_id' => $user->id
        ]);

        CompanyProduct::factory()->create([
            'product_id' => $sku,
            'company_id' => $companyUser->company_id
        ]);

        $response = $this->get(
            route('productFiles', ['sku' => $sku, 'type' => 'epub']),
            $this->headers
        );
        $response->assertStatus(200);
    }

    public function test_it_can_provide_content_deliverable_if_token_has_allcontent_permission_with_allcontent_user_permission()
    {
        $sku = '9780470185483';
        $user = $this->createUserAndToken(['PI', 'ALLCONTENT']);

        UserPermission::factory()->create([
            'user_id' => $user->id,
            'abilities' => ['ALLCONTENT']
        ]);

        $response = $this->get(
            route('productFiles', ['sku' => $sku, 'type' => 'epub']),
            $this->headers
        );
        $response->assertStatus(200);
    }

    /**
     * Temporarily commenting this method, we will bring it back later
     * PLT-344
     */
    private function test_it_can_provide_content_deliverable_if_token_has_allcontent_permission()
    {
        $this->createUserAndToken(['PI', 'ALLCONTENT']);

        $response = $this->get(
            route('productFiles', ['sku' => 9780470185483, 'type' => 'epub']),
            $this->headers
        );

        $response->assertStatus(200);
    }

    /**
     * Temporarily commenting this method, we will bring it back later
     * PLT-344
     */
    private function test_it_can_access_any_api_route_if_token_has_su_permission()
    {
        $this->createUserAndToken(['SU']);

        $response = $this->get(
            route('productFiles', ['sku' => 9780470185483, 'type' => 'epub']),
            $this->headers
        );

        $response->assertStatus(200);

        $response = $this->get(
            route('coverImages', ['sku' => 9780470185483, 'size' => 'small']),
            $this->headers
        );

        $response->assertStatus(200);
    }


    public function test_it_can_not_provide_content_deliverables_by_product_sku_if_user_dont_have_product_access()
    {
        $this->createUserAndToken(['PI', 'CONTENT']);

        $response = $this->get(
            route('productFiles', ['sku' => 9780470185483, 'type' => 'epub']),
            $this->headers
        );

        $response->assertJson([
            'errorMessage' => 'You dont have access to download the files of this Product.'
        ]);

        $response->assertStatus(403);
    }
}

