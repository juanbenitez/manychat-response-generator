<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions;

class InvalidMessageType extends \Exception
{
    public static function withType(string $type): self
    {
        return new self(
            sprintf('Invalid message type: %s', $type)
        );
    }
}
