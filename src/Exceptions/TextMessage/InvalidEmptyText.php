<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions\TextMessage;

class InvalidEmptyText extends \Exception
{
    public static function make(): self
    {
        return new self('Invalid empty text');
    }
}
