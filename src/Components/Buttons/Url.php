<?php

namespace Juanbenitez\ManychatResponseGenerator\Components\Buttons;

use Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons\InvalidWebViewSize;
use Juanbenitez\ManychatResponseGenerator\Exceptions\EmptyRequiredAttribute;

class Url extends Button
{
    const WEBVIEW_SIZES = ['full', 'medium', 'compact'];

    protected $url;
    protected $webview_size;

    protected function __construct($caption, $url, $size)
    {
        parent::__construct(self::URL_TYPE, $caption);
        $this->setUrl($url);
        $this->setWebViewSize($size);
    }

    public static function make($caption, $url, $size = 'full')
    {
        return new self($caption, $url, $size);
    }

    public function setUrl($url)
    {
        if ($url == '') {
            throw EmptyRequiredAttribute::from('url');
        }
        $this->url = $url;
    }

    public function setWebViewSize($size)
    {
        if (! in_array($size, self::WEBVIEW_SIZES)) {
            throw InvalidWebViewSize::withSize($size);
        }
        $this->webview_size = $size;
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'caption' => $this->caption,
            'url' => $this->url,
        ];
    }
}
