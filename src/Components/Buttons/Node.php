<?php
namespace Juanbenitez\ManychatResponseGenerator\Components\Buttons;

use Juanbenitez\ManychatResponseGenerator\Traits\Gotoable;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Go;

class Node extends Button
{
    use Gotoable;

    public function __construct($caption, $target)
    {
        parent::__construct(self::NODE_TYPE, $caption);
        $this->setTarget($target);
    }
    
    public static function make($caption, $target)
    {
        return new self($caption, $target);
    }
}