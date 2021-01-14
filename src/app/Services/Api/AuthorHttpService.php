<?php

namespace App\Services\Api;

use App\Services\Api\HttpService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class AuthorHttpService extends HttpService
{

    public function getAuthors(array $authors)
    {
        try {
            $authorCollection = [];
            foreach($authors as $author){
                $authorCollection[] = $this->process($author)->json();
            }
            return collect($authorCollection);
        } catch (\Exception $e){
            throw new NotFoundResourceException('Sorry, this author was not found', 404);
        }
    }

}
