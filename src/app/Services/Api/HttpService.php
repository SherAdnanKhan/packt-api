<?php


namespace App\Services\Api;


use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Illuminate\Http\Client\Response;
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
     * @param array $headers
     * @return Response
     *
     */
    protected function process(string $uri = '', array $params = [], $type = 'get', $headers = [])
    {
         return Http::withHeaders ($headers)->retry (5, 100)->
            {$type}($this->uri . $uri, $params)
                ->throw ();
    }
}
