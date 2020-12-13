<?php
namespace Juanbenitez\ManychatResponseGenerator\Actions;

use ArrayAccess;
use Juanbenitez\ManychatResponseGenerator\Traits\Arrayable;
use Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons\InvalidActionType;

abstract class Action implements Arrayable
{
    const ADD_TAG    = 'add_tag';
    const REMOVE_TAG = 'remove_tag';
    const VALID_ACTION_TYPES = [self::ADD_TAG, self::REMOVE_TAG];

    protected $type;

    public function __construct($type)
    {
        $this->setType($type);
    }
    
    public function setType(string $type): void
    {
        if (!in_array($type, self::VALID_ACTION_TYPES)) {
            throw InvalidActionType::withType($type);
        }
        $this->type = $type;
    }


}