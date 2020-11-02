<?php


namespace App\Services\Api;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

abstract class HttpService
{

    /**
     * @var Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $uri;

    public function __construct(Client $client, string $uri)
    {
        $this->client = $client;
        $this->uri = $uri;
    }

    protected function get(string $uri)
    {
        $response = Http::retry(5, 100)->get($this->uri . $uri)->throw();
        return $response;
    }
}
