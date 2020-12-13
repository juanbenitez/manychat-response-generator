<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Components\MediaComponent;

class File extends Message
{
    use MediaComponent;

    const FILE_TYPE = 'file';

    private function __construct($url)
    {
        parent::__construct(self::FILE_TYPE);
        $this->setUrl($url);
    }

    public static function make($url)
    {
        return new self($url);
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'url' => $this->url,
        ];
    }
}
