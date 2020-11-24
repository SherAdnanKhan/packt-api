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
        $meta = $this->resource['summary']['meta'];

        return [
            'id' => $this->resource['summary']['productId'],
            'isbn13' => $this->resource['summary']['isbn13'],
            'isbn10' => $this->resource['summary']['isbn10'],
            'isbns' => $this->resource['summary']['isbns'],
            'title' => $this->resource['summary']['title'],
            'product_type' => ucfirst($this->resource['summary']['type']) ?? false,
            'tagline' => $this->resource['summary']['oneLiner'] ?? false,
            'pages' => $this->resource['summary']['pages'] ?? false,
            'publication_date' => $this->resource['summary']['publicationDate'] ?? false,
            'length' => $this->resource['summary']['length'] ?? false,
            'learn' => $this->resource['summary']['learn'] ?? false,
            'features' => $this->resource['summary']['features'] ?? false,
            'description' => $this->resource['summary']['about'] ?? false,
            'authors' => Author::collection($this->resource['authors']),
            'url' => self::PACKTPUB_URL.$this->resource['summary']['shopUrl'],
            'category' => $meta['category']['category_name'] ?? false,
            'concept' => $meta['concepts']['concept_name'] ?? false,
            'languages' => $this->getLanguages($meta),
            'tools' => $this->getTools($meta),
            'jobroles' => $this->getJobRoles($meta),
            'vendors' => $this->getVendors($meta),
            'images' => $this->getImagePaths(),
        ];
    }


    private function getTools($meta){
        if(isset($meta['tool']['tool_name']) && $meta['tool']['tool_name'] !== ''){
            return [
                'name' => $meta['tool']['tool_name'],
                'vendor' => $meta['vendor']['vendor'] ?? null,
                'type' => null,
                'language' => $meta['language']['language_name'],
            ];
        }
    }

    private function getVendors($meta){
        if(isset($meta['vendor']['vendor']) && $meta['vendor']['vendor'] !=''){
            $response = ['name' => $meta['vendor']['vendor']];
            return $response;
        }
        return false;
    }

    private function getJobRoles($meta){
        return false;
    }

    private function getLanguages($meta){


        return  [
            [
                'name' => $meta['language']['language_name'] ?? '',
                'version' => $meta['languageVersion']['language_version_name'] ?? '',
                'primary' => true,
                'expertise' => $meta['expertise'] ?? null
            ]
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
