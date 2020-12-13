<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Components\ButtonCollection;
use Juanbenitez\ManychatResponseGenerator\Components\MediaComponent;

class Video extends Message
{
    use MediaComponent, ButtonCollection;

    const VIDEO_TYPE = 'video';

    private function __construct($url)
    {
        parent::__construct(self::VIDEO_TYPE);
        $this->setUrl($url);
    }

    public static function make($url)
    {
        return new self($url);
    }

    public function toArray(): array
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
