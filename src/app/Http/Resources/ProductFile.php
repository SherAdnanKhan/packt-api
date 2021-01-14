<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductFile extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        if(isset($this->resource['location']['data'])) {
            $data = $this->resource[ 'location' ][ 'data' ];

            return [
                'download_url' => $this->getLocationUrl ($data)
            ];
        }
    }
    private function getLocationUrl($data){

         if(isset($data['message']['headers']['Location']) && $data['message']['headers']['Location'] !== ''){
             return $data['message']['headers']['Location'];
        }
    }
}
