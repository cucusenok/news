<?php


namespace App\library\http;

use App\library\http\IHttpClient;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use App\library\http\Response;


class GuzzleHttpAdapter implements IHttpClient
{

    public GuzzleClient $guzzleClient;

    public function __construct(array $params = array())
    {
        $this->guzzleClient = new GuzzleClient();
    }

    public function get(string $url, array $params = array() ) : Response {
        $queryString = $url . http_build_query($params);
        $guzzleResponse = $this->guzzleClient->request('GET', $url);

        return new Response(
            $guzzleResponse->getStatusCode(),
            $guzzleResponse->getHeaders(),
            $guzzleResponse->getBody()->getContents(),
            $guzzleResponse->getProtocolVersion()
        );

    }

    public function post(string $url, array $params){}
    
    public function put(string $url, array $params){}
    
    public function delete(string $url, array $params) {}
}