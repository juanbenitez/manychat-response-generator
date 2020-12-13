<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests\Messages;

use Juanbenitez\ManychatResponseGenerator\Messages\Message;

class SomeMessage extends Message
{

    public function __construct($type)
    {
        parent::__construct($type);
    }
    public function toArray()
    {
        //
    }
}
