<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions;

class InvalidImageAspectRatio extends \Exception
{
    public static function withRatio(string $ratio): self
    {
        return new self(
            sprintf('Invalid image aspect ratio: %s', $ratio)
        );
    }
}
