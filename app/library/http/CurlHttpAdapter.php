<?php


namespace App\library\http;


use GuzzleHttp\Client as GuzzleClient;

class CurlHttpAdapter implements IHttpClient
{


/*    public function __construct(array $params = array())
    {
    }*/

    public function get(string $url, array $params = array() ) : Response {
        $queryString = $url . http_build_query($params);

        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $queryString);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        $curlInfo = curl_getinfo($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $headers = [];

        return new Response(
            $curlInfo['http_code'],
            $headers,
            $output,
            '1'
        );

    }

    public function post(string $url, array $params){}

    public function put(string $url, array $params){}

    public function delete(string $url, array $params) {}

}
