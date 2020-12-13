<?php

namespace Juanbenitez\ManychatResponseGenerator\Messages;

use Juanbenitez\ManychatResponseGenerator\Exceptions\InvalidMessageType;

abstract class Message
{
    const VALID_MESSAGE_TYPES = ['text', 'image', 'video', 'audio', 'file', 'cards'];

    protected $type;

    public function __construct($type)
    {
        $this->setType($type);
    }

    public function setType($type): void
    {
        if (! in_array($type, self::VALID_MESSAGE_TYPES)) {
            throw InvalidMessageType::withType($type);
        }

        $this->type = $type;
    }

    abstract public function toArray();
}
