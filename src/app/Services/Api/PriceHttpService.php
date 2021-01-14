<?php

namespace App\Services\Api;

use App\Http\Resources\ProductPrice;
use Exception;
use Symfony\Component\Translation\Exception\NotFoundResourceException;


class PriceHttpService extends HttpService
{

    const DEFAULT_PRICES = ['USD', 'AUD', 'INR', 'GBP', 'EUR'];

    public function getProductPrice($sku, $code): ProductPrice
    {
        try {
            $response = $this->process($sku)->json();
            $isbns = $response['data']['result']['isbns'];

            $prices = [];

            foreach ($isbns as $type => $isbn) {
                $productTypeResult = $this->process($isbn)->json();
                $truncatedList = $this->removeExtraPrices($productTypeResult['data']['result']['pricing']['exclusive'], $code);
                $prices[$type] = $truncatedList;
            }

            return new ProductPrice($prices);

        } catch (Exception $e) {
            throw new NotFoundResourceException($e->getMessage(), 404);
        }

    }


    private function removeExtraPrices($prices, $codes = null): array
    {
        if(!$codes){
            $codes = self::DEFAULT_PRICES;
            return collect($prices)->only($codes)->toArray();

        } elseif (!in_array($codes, self::DEFAULT_PRICES)){
            abort(404, 'Sorry, we don\'t use that currency or currency code, accepted ISO Currency Codes are '.implode(',', self::DEFAULT_PRICES ));
        }

        return collect($prices)->only(strtoupper($codes))->toArray();


    }


}
