<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductFile;
use App\Services\Api\AuthorHttpService;
use App\Services\Api\PriceHttpService;
use App\Services\Api\ProductFileHttpService;
use App\Services\Api\ProductHttpService;
use App\Traits\LogTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    use LogTrait;

    private $productFileData;

    public function index(ProductHttpService $productHttpService, Request $request){

        $this->logInfo('info', 'User has accessed Product List API', $request);

        return Cache::remember('allproducts_'.$request->get('page').'-'.$request->user()->id.'-'.$request->get('limit') ?? '', 43200, function () use ($productHttpService, $request) {
            $response = $productHttpService->setRequest($request)->getProductList()->toArray();
            $response['products'] = $response['data'];
            unset($response['data'], $response['links']);
            return response()->json($response);
        });
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
    ): JsonResponse
    {
        try {

            $this->logInfo('info', 'User has accessed Product Author API via SKU: ' . $sku, $request);
            $response = $productHttpService->getProductInfo($sku, $authorHttpService)['authors'];
            return response()->json($response);

        } catch (RequestException $e) {
            throw new ModelNotFoundException();
        }
    }

    /**
     * Stream files of a specified product
     * @param int $sku
     * @param string $type
     * @param Request $request
     * @param ProductFileHttpService $productFileHttpService
     * @return JsonResponse|StreamedResponse
     */
    public function getFiles(
        int $sku,
        string $type,
        Request $request,
        ProductFileHttpService $productFileHttpService
    )
    {
        try {
            $this->logInfo('info', 'User has accessed Product File API ' . $sku, $request);
            $this->productFileData['location'] = $productFileHttpService->setRequest($request)->getFileData($request);

            $url = ProductFile::make($this->productFileData)->resolve();

            $filename = $sku . '.' . $type;

            return response()->streamDownload(function() use ($url, $filename) {
                // Open output stream
                if ($file = fopen($url['download_url'], 'rb')) {
                    while(!feof($file) and (connection_status()==0)) {
                        print(fread($file, 1024*8));
                        flush();
                    }
                    fclose($file);
                }
            }, $filename);

        } catch (\Exception $e) {
            throw new ModelNotFoundException('Sorry, SKU was not found', 404);
        }
    }

   public function getPrice(
        int $sku,
        PriceHttpService $priceHttpService,
        Request $request,
        $code = null
    ): JsonResponse
   {

        try {

            $this->logInfo('info', 'User has accessed Product Price API via SKU: ' . $sku, $request);
            $response = $priceHttpService->getProductPrice($sku, $code);
            return response()->json($response);

        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }
    }

}
