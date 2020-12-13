<?php

namespace Juanbenitez\ManychatResponseGenerator\Exceptions;

class JsonEncodingError extends \Exception
{
    /**
     * Create a new JSON encoding exception for the object.
     *
     * @param  mixed  $object
     * @param  string  $message
     * @return static
     */
    public static function forObject($object, $message): self
    {
        return new static(
            sprintf('Error encoding object [%s] to JSON: %s', get_class($object), $message)
        );
    }
}
