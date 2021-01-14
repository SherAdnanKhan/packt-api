<?php


namespace App\Services\Api;

use App\Services\Api\HttpService;
use Illuminate\Http\Client\Response;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ProductFileHttpService extends HttpService
{
    protected $request;

    public function getFileData($request): Response
    {
        try {
          $url='/products/'.$request->sku.'/files/'.$request->type;
          $headers = [
                'x-api-key' => config('services.entitlement_key')
            ];

            return   $this->process ($url,[],'GET',$headers);

        } catch (\Exception $e){
            throw new NotFoundResourceException('Sorry, SKU was not found', 404);
        }
    }
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }
}
