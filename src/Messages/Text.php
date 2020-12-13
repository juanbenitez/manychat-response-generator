<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Components\ButtonCollection;
use Juanbenitez\ManychatResponseGenerator\Exceptions\TextMessage\InvalidEmptyText;

class Text extends Message
{
    use ButtonCollection;

    const TEXT_TYPE = 'text';
    protected $text;


    protected function __construct($text)
    {
        parent::__construct(self::TEXT_TYPE);
        $this->setText($text);
    }

    public function setText($text)
    {
        if ($text == '') {
            throw InvalidEmptyText::make();
        }
        $this->text = $text;
    }

    public static function make($text)
    {
        return new self($text);
    }

    public function getText()
    {
        return $this->text;
    }

    public function toArray(): array
    {
        $structure['type'] = $this->type;
        $structure['text'] = $this->text;
        if (!empty($this->buttons)) {
            foreach ($this->buttons as $button) {
                $structure['buttons'][] = $button->toArray();
            }
        }

        return $structure;
    }
}
