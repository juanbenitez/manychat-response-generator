<?php

namespace Juanbenitez\ManychatResponseGenerator\Components\Buttons;

use Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons\InvalidButtonType;
use Juanbenitez\ManychatResponseGenerator\Exceptions\EmptyRequiredAttribute;

abstract class Button
{
    const NODE_TYPE = 'node';
    const FLOW_TYPE = 'flow';
    const CALL_TYPE = 'call';
    const URL_TYPE  = 'url';
    const BUY_TYPE  = 'buy';
    const DYNAMIC_TYPE  = 'dynamic_block_callback';
    
    const VALID_BUTTON_TYPES = [self::CALL_TYPE, self::URL_TYPE, self::FLOW_TYPE, self::NODE_TYPE, self::BUY_TYPE, self::DYNAMIC_TYPE];
    protected $caption;
    protected $type;

    public function __construct($type, $caption)
    {
        $this->setType($type);
        $this->setCaption($caption);
    }

    public function setCaption(string $caption): void
    {
        if ($caption == '') {
            throw EmptyRequiredAttribute::from('caption');
        }
        $this->caption = $caption;
    }

    public function setType(string $type): void
    {
        if (!in_array($type, self::VALID_BUTTON_TYPES)) {
            throw InvalidButtonType::withType($type);
        }
        $this->type = $type;
    }

    public abstract function toArray();
}
