<?php

namespace Juanbenitez\ManychatResponseGenerator\Traits;

use Juanbenitez\ManychatResponseGenerator\Exceptions\EmptyRequiredAttribute;

/**
 * Gotoable trait
 */
trait Gotoable
{
    protected $target;
    
    public function setTarget($target)
    {
        if ($target == '') {
            throw EmptyRequiredAttribute::from('target');
        }
        $this->target = $target;
    }

    public function toArray()
    {
        return [
            'type'    => $this->type,
            'caption' => $this->caption,
            'target'  => $this->target
        ];
    }
}
