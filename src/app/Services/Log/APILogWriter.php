<?php

namespace App\Services\Log;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Spatie\HttpLogger\LogWriter;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class APILogWriter implements LogWriter
{
    /** @var array Endpoint Names and their Description */
    private array $endpointNameDescription;

    /** @var array Http Status Text */
    private array $httpStatusText;

    public function logRequest(Request $request)
    {
        dd('do nothing');
    }

    /**
     * Creates an API Log in database
     * @param Request $request
     * @param SymfonyResponse $response
     */
    public function logRequestAndResponse(Request $request, SymfonyResponse $response)
    {

        $this->endpointNameDescription = config('endpoints.nameAndDescription.api');

        $this->httpStatusText = config('endpoints.httpStatusText');

        $routeName = $request->route()->getName();
        $message = auth()->user()->id;
        $context = [
            'endpoint' => $request->getPathInfo(),
            'method' => $request->getMethod(),
            'endpointName' => $this->getEndpointName($routeName),
            'description' => $this->getRealDescription(
                $this->getEndpointDescription(
                    $routeName
                ),
                $request
            ),
            'status' => $this->httpStatusToText(
                $response->getStatusCode()
            )
        ];

        Log::channel('api')->info($message, $context);
    }

    /**
     * Get endpoint description from $endpointNameDescription
     * @param string $endpointName
     * @return int|string|null
     */
    public function getEndpointName(string $endpointName)
    {
        if(array_key_exists($endpointName, $this->endpointNameDescription)) {
            return key($this->endpointNameDescription[$endpointName]);
        }
        return '';
    }

    /**
     * Get endpoint description from $endpointNameDescription
     * @param string $endpointName
     * @return string
     */
    public function getEndpointDescription(string $endpointName): string
    {
        if(array_key_exists($endpointName, $this->endpointNameDescription)) {
            return current($this->endpointNameDescription[$endpointName]);
        }
        return '';
    }

    /**
     * Get replaced description
     * @param string $description
     * @param Request $request
     * @return string
     */
    public function getRealDescription(string $description, Request $request) : string
    {
        return Lang::get($description, [
            'productID' => $request->route()->parameter('product', $request->route()->parameter('sku')),
            'fileType' => $request->route()->parameter('type'),
            'code' => $request->route()->parameter('code'),
        ]);
    }

    /**
     * Return a HTTP Status in Text format
     * @param string $status
     * @return string
     */
    public function httpStatusToText(string $status) : string
    {
        if(array_key_exists($status, $this->httpStatusText))
        {
            return $this->httpStatusText[$status];
        }
        return 'Undefined Status';
    }
}
