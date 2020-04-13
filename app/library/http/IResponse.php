<?php


namespace App\library\http;


abstract IResponse
{
    public string $status;
    public string $statusCode;
    public array $headers;
    public string $protocol;


}