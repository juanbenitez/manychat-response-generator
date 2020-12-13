<?php
namespace Juanbenitez\ManychatResponseGenerator\Actions;

class AddTag
{
    const ACTION_TYPE = 'add_tag';
    
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    protected static function make($name)
    {
        return new self($name);
    }
}