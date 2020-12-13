<?php
namespace Juanbenitez\ManychatResponseGenerator\Components\Buttons;

use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Button;

class Dynamic extends Button
{
    protected $url;
    protected $method  = 'GET';
    protected $headers = [];
    protected $payload = [];

    public function __construct($caption, $url, $method, $headers = [], $payload = [])
    {
        parent::__construct(self::DYNAMIC_TYPE, $caption);
        $this->setUrl($url);
        $this->setMethod($method);
        $this->setHeaders($headers);
        $this->setPayload($payload);
    }
    
    public static function make($caption, $url, $method = 'GET', $headers = [], $payload = [])
    {
        return new self($caption, $url, $method, $headers, $payload);
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = array_merge(
            $this->headers, 
            $headers
        );
    }

    public function setPayload(array $payload)
    {
        $this->payload = array_merge(
            $this->payload, 
            $payload
        );
    }

    public function addPayload($key, $value)
    {
        $this->payload[$key] = $value;
        return $this;
    }

    public function toArray()
    {
        return [
            'type'    => $this->type,
            'caption' => $this->caption,
            'url'     => $this->url,
            'method'  => $this->method,
            'headers' => $this->headers,
            'payload' => $this->payload,
        ];
    }
}