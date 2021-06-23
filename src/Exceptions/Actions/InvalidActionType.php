<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions\Actions;

class InvalidActionType extends \Exception
{
    public static function withType(string $type): self
    {
        return new self(
            sprintf('Invalid action type: %s', $type)
        );
    }
}
