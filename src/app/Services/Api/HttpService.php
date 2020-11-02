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

    /**
     * @param string $uri
     * @param array|null $params
     * @param string $type
     * @return \Illuminate\Http\Client\Response
     * @throws \Illuminate\Http\Client\RequestException
     */
    protected function process(string $uri, array $params = [], $type = 'get')
    {
        return Http::retry(5, 100)->
        {$type}($this->uri . $uri, $params)
            ->throw();
    }

    protected function post(string $uri)
    {
        return Http::retry(5, 100)->post($this->uri.$uri)->throw();
    }
}
