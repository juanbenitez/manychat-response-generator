<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions;

class EmptyRequiredAttribute extends \Exception
{
    public static function from($attribute): self
    {
        return new self(
            sprintf('Required attribute is empty: %s', $attribute)
        );
    }
}
