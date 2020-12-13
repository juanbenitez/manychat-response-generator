<?php

namespace Juanbenitez\ManychatResponseGenerator\Components\Buttons;

use Juanbenitez\ManychatResponseGenerator\Exceptions\EmptyRequiredAttribute;

class Call extends Button
{
    protected $phone;

    protected function __construct($caption, $phone)
    {
        parent::__construct(self::CALL_TYPE, $caption);
        $this->setPhone($phone);
    }

    public static function make($caption, $phone)
    {
        return new self($caption, $phone);
    }

    public function setPhone($phone)
    {
        if ($phone == '') {
            throw EmptyRequiredAttribute::from('phone');
        }
        $this->phone = $phone;
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'caption' => $this->caption,
            'phone' => $this->phone,
        ];
    }
}
