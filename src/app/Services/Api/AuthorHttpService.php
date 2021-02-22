<?php

namespace App\Services\Api;

use Illuminate\Support\Collection;

class AuthorHttpService extends HttpService
{

    public function getAuthors(array $authors): Collection
    {
        $authorCollection = [];

        foreach($authors as $author) {
            try {
                $authorCollection[] = $this->process($author)->json();
            } catch (\Exception $e){
                // do nothing
            }
        }
        return collect($authorCollection);
    }
}
