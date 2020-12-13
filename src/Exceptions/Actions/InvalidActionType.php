<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons;

class InvalidActionType extends \Exception
{
    public static function withType(string $type): self
    {
        return new self(
            sprintf('Invalid action type: %s', $type)
        );
    }
}
