<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductIndexCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'products' => $this->resource->map(function($row){
               return [
                   'id' => $row['isbn'] ?? '',
                   'isbn13' => $row['isbn'] ?? '',
                   'title' => $row['name'],
                   'publication_date' => $row['date_of_publication'],
                   'authors' => explode(',', $row['authors']),
                   'categories' => $row['categories_without_path'],
                   'concept' => $row['concept'] ?? false,
                   'language' => $row['language'] ?? false,
                   'tool' => $row['tool'] ?? false,
                   'vendor' => $row['vendor'] ?? false
               ];
            }),
        ];
    }
}
