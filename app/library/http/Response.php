<?php


namespace App\library\http;


class Response
{
    private string $status;
    private string $statusCode;
    private array $headers;
    private string $protocolVersion;
    private string $body;


    /**
     * Response constructor.
     * @param int $statusCode
     * @param array $headers
     * @param array $body
     * @param string $protocolVersion
     */
    public function __construct(int $statusCode, array $headers = array(), string $body = '', string $protocolVersion = '')
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
        $this->protocolVersion= $protocolVersion;

    }

    public function getBody() : string
    {
        return $this->body;
    }


    public function getContent() : string {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }


    public function getStatus() : string
    {
        return $this->status;
    }

    public function setStatus( string $status): void
    {
        $this->status = $status;
    }


    public function getStatusCode() : string
    {
        return $this->statusCode;
    }


    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }


    public function getHeaders() : array
    {
        return $this->headers;
    }


    public function setHeaders( array $headers): void
    {
        $this->headers = $headers;
    }


    public function getProtocolVersion() : string
    {
        return $this->protocolVersion;
    }


    public function setProtocolVersion( string $protocolVersion): void
    {
        $this->protocolVersion = $protocolVersion;
    }


}