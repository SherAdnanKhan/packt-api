<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Author extends JsonResource
{

    const PACKT_AUTHOR_URL = 'https://www.packtpub.com/authors/';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource['id'],
            'name' => $this->resource['author'],
            'about' => $this->resource['description'],
            'profile_url' => self::PACKT_AUTHOR_URL.$this->resource['urlKey']
        ];
    }
}
