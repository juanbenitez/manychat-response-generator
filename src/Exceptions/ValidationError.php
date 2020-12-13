<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions;

class ValidationError extends \Exception
{
    public static function withMessage($msg): self
    {
        return new self($msg);
    }
}
