<?php

namespace App\Services\Api;

use Algolia\AlgoliaSearch\SearchClient;
use App\Http\Resources\Product;
use App\Http\Resources\ProductIndexCollection;
use App\Http\Responses\ProductResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\RequestException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class ProductHttpService extends HttpService
{

    use ValidatesRequests;


    const PRODUCT_SUMMARY_API = 'products/%s/summary';
    const PRODUCT_IMAGE_ORIGINAL_API = 'products/%s/cover/normal';
    const PRODUCT_IMAGE_SMALL_API = 'products/%s/cover/smaller';

    public $productData;

    /**
     * @var \App\Services\Api\AuthorHttpService
     */

    private $authorHttpService;

    protected $request;


    public function getProductList()
    {
        try {

            $this->validate($this->request, [
                'limit' => 'integer|max:1000'
            ]);

            $searchClient = SearchClient::create(config('app.algolia_id'), config('app.algolia_secret'))
                ->initIndex('store_prod_gb_products');

            $results = $searchClient->browseObjects(['query' => '*',
                'hitsPerPage' => 2000,
            ]);

            $data = ProductIndexCollection::make(collect($results))->resolve();

            return  $this->paginate($data['products'], $this->request->get('limit') ?? 100, $this->request->get('page'), ['path' => $this->request->url()]);

        } catch (ValidationException $e) {
            throw $e;
        } catch(\Exception $e){
            throw new ModelNotFoundException();
        }

    }


    public function paginate($items, $perPage = 100, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * @param string $sku
     * @param \App\Services\Api\AuthorHttpService $authorHttpService
     * @return array
     * @throws RequestException
     */
    public function getProductInfo(string $sku, AuthorHttpService $authorHttpService)
    {
        $this->authorHttpService = $authorHttpService;

        $this->productData['summary'] = $this->getProductSummary($sku);
        $this->productData['images'] = $this->getProductImage($sku);
        $this->productData['authors'] = $this->getAuthorInformation($this->productData['summary']['authors']);

        return Product::make($this->productData)->resolve();
    }


    /**
     * @param string $sku
     * @return array
     */
    public function getProductSummary(string $sku)
    {
        try {
            return $this->process(sprintf(self::PRODUCT_SUMMARY_API, $sku))->json();
        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }
    }

    /**
     * @param string $sku
     * @param string $size
     * @return array|string|null
     * @throws RequestException
     */
    public function getProductImage(string $sku, $size = 'all')
    {

        switch ($size) {
            case 'small':
                return $this->getSmallImage($sku);
                break;
            case 'large':
                return $this->getCoverImage($sku);
                break;
            default:
                return [
                    'small' => $this->getSmallImage($sku),
                    'cover' => $this->getCoverImage($sku)
                ];
                break;
        }


    }

    /**
     * @param string $sku
     * @return array|false
     */
    private function getSmallImage(string $sku)
    {
        try {
            if ($this->process(sprintf(self::PRODUCT_IMAGE_SMALL_API, $sku))->successful()) {
                return [
                    'url' => route('coverImages', ['sku' => $sku, 'size' => 'small']),
                    'image' => $this->process(sprintf(self::PRODUCT_IMAGE_SMALL_API, $sku))->body()
                ];
            }
        } catch(\Exception $e){
            throw new ModelNotFoundException();
        }

        return false;

    }

    /**
     * @param string $sku
     * @return array
     */
    private function getCoverImage(string $sku): array
    {
        try {
            if ($this->process(sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku))->successful()) {
                return [
                    'url' => route('coverImages', ['sku' => $sku, 'size' => 'large']),
                    'image' => $this->process(sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku))->body()
                ];
            }
        } catch(\Exception $e){
            throw new ModelNotFoundException();
        }

        return false;

    }

    private function getAuthorInformation($authors){
        try {
            return $this->authorHttpService->getAuthors($authors);
        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }
    }

    public function setRequest($request){
        $this->request = $request;
        return $this;
    }

}
