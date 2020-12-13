<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Components\MediaComponent;

class Audio extends Message
{
    use MediaComponent;

    const AUDIO_TYPE = 'audio';

    private function __construct($url)
    {
        parent::__construct(self::AUDIO_TYPE);
        $this->setUrl($url);
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
