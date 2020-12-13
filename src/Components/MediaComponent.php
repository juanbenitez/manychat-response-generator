<?php

namespace Juanbenitez\ManychatResponseGenerator\Components;

use Juanbenitez\ManychatResponseGenerator\Exceptions\InvalidMediaExtension;

trait MediaComponent
{
    protected $url;
    protected $extension;

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getMediaExtension(string $url): string
    {
        if ($url == '') {
            return $url;
        }

        return strtolower(pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION));
    }

    public function checkExtension(string $ext, array $validExtensions = []): void
    {
        if (! in_array($ext, $validExtensions) && ! empty($validExtensions) && $ext) {
            throw InvalidMediaExtension::withExtension($ext);
        }
    }
}
