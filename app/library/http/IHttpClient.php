<?php


namespace App\library\http;

use App\library\http\Response;

interface IHttpClient
{
    public function get(string $url, array $params = array()) : Response;
    public function post(string $url, array $params);
    public function put(string $url, array $params);
    public function delete(string $url, array $params);
}