<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    const PACKTPUB_URL = 'https://packtpub.com';

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
            'isbn10' => $this->resource['summary']['isbn10'],
            'isbns' => $this->resource['summary']['isbns'],
            'title' => $this->resource['summary']['title'],
            'tagline' => $this->resource['summary']['oneLiner'],
            'pages' => $this->resource['summary']['pages'],
            'publication_date' => $this->resource['summary']['publicationDate'],
            'length' => $this->resource['summary']['length'],
            'learn' => $this->resource['summary']['learn'],
            'features' => $this->resource['summary']['features'],
            'description' => $this->resource['summary']['about'],
            'authors' => Author::collection($this->resource['authors']),
            'url' => self::PACKTPUB_URL.$this->resource['summary']['shopUrl'],
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
