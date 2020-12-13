<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests\Buttons;

use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Button;

class SomeButton extends Button
{
    public function __construct($type, $caption)
    {
        parent::__construct($type, $caption);
    }
    public function toArray()
    {
        //
    }
}
