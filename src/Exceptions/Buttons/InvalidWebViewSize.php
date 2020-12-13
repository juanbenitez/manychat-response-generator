<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons;

class InvalidWebViewSize extends \Exception
{
    public static function withSize(string $size): self
    {
        return new self(
            sprintf('Invalid webview size: %s', $size)
        );
    }
}
