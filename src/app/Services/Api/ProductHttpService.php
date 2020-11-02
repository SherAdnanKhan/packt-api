<?php

namespace App\Services\Api;

use App\Http\Resources\Product;
use Http\Discovery\Exception\NotFoundException;
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
     */
    public function getProductInfo(string $sku)
    {
        $this->productData['summary'] = $this->getProductSummary($sku);
        $this->productData['images'] = $this->getProductImages($sku);

        return Product::make($this->productData)->resolve();
    }


    /**
     * @param string $sku
     * @return array
     */
    private function getProductSummary(string $sku)
    {
        try {
            return $this->get(sprintf(self::PRODUCT_SUMMARY_API, $sku))->json();
        } catch (\Exception $e) {
            throw new NotFoundException('Sorry, the product was not found', 404);
        }
    }

    /**
     * @param string $sku
     * @return array
     */
    private function getProductImages(string $sku)
    {
        return [
            'small' => $this->getSmallImage($sku),
            'large' => $this->getCoverImage($sku)
        ];

    }

    /**
     * @param string $sku
     * @return string|null
     */
    private function getSmallImage(string $sku): ?string
    {

        if (Http::get($this->uri . sprintf(self::PRODUCT_IMAGE_SMALL_API, $sku))->successful()) {
            return $this->uri . sprintf(self::PRODUCT_IMAGE_SMALL_API, $sku);
        }

        return false;
    }

    /**
     * @param string $sku
     * @return string|null
     */
    private function getCoverImage(string $sku): ?string
    {
        if (Http::get($this->uri . sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku))->successful()) {
            return $this->uri . sprintf(self::PRODUCT_IMAGE_ORIGINAL_API, $sku);
        }

        return false;
    }

}
