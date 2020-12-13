<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons;

class InvalidButtonType extends \Exception
{
    public static function withType(string $type): self
    {
        return new self(
            sprintf('Invalid button type: %s', $type)
        );
    }
}
