<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Components\Card;
use Juanbenitez\ManychatResponseGenerator\Exceptions\InvalidImageAspectRatio;

class Cards extends Message
{
    const CARDS_TYPE = 'cards';
    const HORIZONTAL_ASPECT_RATIO = 'horizontal';
    const SQUARE_ASPECT_RATIO     = 'square';

    const VALID_IMAGE_ASPECT_RATIOS = [self::HORIZONTAL_ASPECT_RATIO, self::SQUARE_ASPECT_RATIO];

    protected $imageAspectRatio = 'horizontal';
    protected $elements = [];


    protected function __construct($imageAspectRatio = 'horizontal')
    {
        parent::__construct(self::CARDS_TYPE);
        $this->setImageAspectRatio($imageAspectRatio);
    }

    public static function make($imageAspectRatio = 'horizontal')
    {
        return new self($imageAspectRatio);
    }

    public function setImageAspectRatio($imageAspectRatio)
    {
        if (!in_array($imageAspectRatio, self::VALID_IMAGE_ASPECT_RATIOS)) {
            throw InvalidImageAspectRatio::withRatio($imageAspectRatio);
        }
        $this->imageAspectRatio = $imageAspectRatio;
    }

    public function addCard(Card $card)
    {
        $this->elements[] = $card;
        return $this;
    }

    public function toArray()
    {
        $structure = [
            'type'     => $this->type,
            'image_aspect_ratio'  => $this->imageAspectRatio,
        ];
        if (!empty($this->elements)) {
            foreach ($this->elements as $card) {
                $structure['elements'][] = $card->toArray();
            }
        }

        return $structure;
    }
}
