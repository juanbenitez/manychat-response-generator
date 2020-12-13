<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Components\ButtonCollection;
use Juanbenitez\ManychatResponseGenerator\Components\MediaComponent;

class Image extends Message
{
    use MediaComponent, ButtonCollection;

    const IMAGE_TYPE = 'image';
    const VALID_IMAGE_EXTENSIONS = ['png', 'gif', 'jpg'];

    private function __construct($url)
    {
        parent::__construct(self::IMAGE_TYPE);
        $this->setUrl($url);
        $this->checkExtension(
            $this->getMediaExtension($this->url),
            self::VALID_IMAGE_EXTENSIONS
        );
    }

    public static function make($url)
    {
        return new self($url);
    }

    public function toArray()
    {
        $structure['type'] = $this->type;
        $structure['url'] = $this->url;
        if (! empty($this->buttons)) {
            foreach ($this->buttons as $button) {
                $structure['buttons'][] = $button->toArray();
            }
        }

        return $structure;
    }
}
