<?php
namespace Juanbenitez\ManychatResponseGenerator\Components\Buttons;

use Juanbenitez\ManychatResponseGenerator\Traits\Gotoable;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Go;

class Flow extends Button
{
    use Gotoable;
    
    public function __construct($caption, $target)
    {
        parent::__construct(self::FLOW_TYPE, $caption);
        $this->setTarget($target);
    }

    public static function make($caption, $target)
    {
        return new self($caption, $target);
    }
}