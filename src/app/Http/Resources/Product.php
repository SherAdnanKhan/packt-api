<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->resource['summary']['productId'],
            'isbn13' => $this->resource['summary']['isbn13'],
            'title' => $this->resource['summary']['title'],
            'tagline' => $this->resource['summary']['oneLiner'],
            'description' => $this->resource['summary']['about'],
            'images' => $this->getImagePaths(),
            'meta' => $this->resource['summary']['meta']
        ];
    }

    private function getImagePaths(){

        $images = [];

        foreach($this->resource['images'] as $size => $image){
            $images[$size] = $image['url'];
        }

        return $images;

    }
}
