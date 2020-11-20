<?php

namespace App\Http\Controllers;

use Algolia\AlgoliaSearch\SearchClient;
use App\Http\Resources\Product;
use App\Services\Api\ProductHttpService;
use App\Services\Api\AuthorHttpService;
use App\Traits\LogTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    use LogTrait;


    public function index(ProductHttpService $productHttpService, Request $request){

        $this->logInfo('info', 'User has accessed Product List API', $request);

        return $productHttpService->setRequest($request)->getProductList();
    }

    /**
     * @param $product
     * @param ProductHttpService $productService
     * @param AuthorHttpService $authorHttpService
     * @param Request $request
     * @return array|JsonResponse
     */
    public function show($product, ProductHttpService $productService, AuthorHttpService $authorHttpService, Request $request)
    {
        try {
            $this->logInfo('info', 'User has accessed Product API via SKU: ' . $product, $request);
            return $productService->getProductInfo($product, $authorHttpService);
        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }

    }

    /**
     * @param int $sku
     * @param string $size
     * @param ProductHttpService $productHttpService
     * @return Application|ResponseFactory|Response|void
     */
    public function getCoverImage(
        int $sku,
        ProductHttpService $productHttpService,
        string $size = 'all'
    )
    {
        try {
            $response = $productHttpService->getProductImage($sku, $size);
            return response($response['image'])->header('Content-Type', 'image/jpeg');

        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }
    }

    public function getAuthors(
        int $sku,
        AuthorHttpService $authorHttpService,
        ProductHttpService $productHttpService,
        Request $request
    )
    {
        try {

            $this->logInfo('info', 'User has accessed Product Author API via SKU: ' . $sku, $request);
            $response = $productHttpService->getProductInfo($sku, $authorHttpService)['authors'];
            return response()->json($response);

        } catch (RequestException $e) {
            throw new ModelNotFoundException();
        }
    }

}
