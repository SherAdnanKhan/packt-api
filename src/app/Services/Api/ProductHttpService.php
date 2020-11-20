<?php

namespace App\Services\Api;

use Algolia\AlgoliaSearch\SearchClient;
use App\Http\Resources\Product;
use App\Http\Resources\ProductIndexCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\RequestException;

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


    public function getProductList(){


        try {
            $max = ($this->request->get('offset') >= 100) ? '900' : $this->request->get('offset');

            $this->validate($this->request, [
                'length' => 'integer|max:' . $max
            ]);

            $searchClient = SearchClient::create(config('app.algolia_id'), config('app.algolia_secret'))
                ->initIndex('store_prod_gb_products');

            $results = $searchClient->search('*', [
                'hitsPerPage' => 100,
                'offset' => $this->request->has('offset') ? $this->request->get('offset') : 0,
                'length' => $this->request->has('limit') ? $this->request->get('limit') : 100
            ]);

            $data = ProductIndexCollection::make(collect($results['hits']))->resolve();

            return $data;
        } catch(\Exception $e){
            throw new ModelNotFoundException();
        }

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
    private function getProductSummary(string $sku)
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
     * @throws RequestException
     */
    private function getSmallImage(string $sku)
    {

        if ($this->process(sprintf(self::PRODUCT_IMAGE_SMALL_API, $sku))->successful()) {
            return [
                'url' => route('coverImages', ['sku' => $sku, 'size' => 'small']),
                'image' => $this->process(sprintf(self::PRODUCT_IMAGE_SMALL_API, $sku))->body()
            ];
        }

        return false;
    }

    /**
     * @param string $sku
     * @return array|string|null
     * @throws RequestException
     */
    private function getCoverImage(string $sku)
    {

            if ($this->process(sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku))->successful()) {
                return [
                    'url' => route('coverImages', ['sku' => $sku, 'size' => 'large']),
                    'image' => $this->process(sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku))->body()
                ];
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
