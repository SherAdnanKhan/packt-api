<?php

namespace App\Services\Api;

use App\Http\Resources\Product;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class ProductHttpService extends HttpService
{
    const PRODUCT_SUMMARY_API = 'products/%s/summary';
    const PRODUCT_IMAGE_ORIGINAL_API = 'products/%s/cover/normal';
    const PRODUCT_IMAGE_SMALL_API = 'products/%s/cover/smaller';

    public $productData;


    /**
     * @param string $sku
     * @return array
     * @throws RequestException
     */
    public function getProductInfo(string $sku)
    {
        $this->productData['summary'] = $this->getProductSummary($sku);
        $this->productData['images'] = $this->getProductImage($sku);

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
            throw new NotFoundException('Sorry, the product was not found', 404);
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
            case 'cover':
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
                'url' => route('coverImages', ['sku' => $sku, 'size' => 'cover']),
                'image' => $this->process(sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku))->body()
            ];
        }

        return false;
    }

}
