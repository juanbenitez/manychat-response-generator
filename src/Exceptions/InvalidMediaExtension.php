<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions;

class InvalidMediaExtension extends \Exception
{
    public static function withExtension(string $ext): self
    {
        return new self(
            sprintf('Invalid media extension: %s', $ext)
        );
    }
}
