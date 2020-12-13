<?php

namespace Juanbenitez\ManychatResponseGenerator\Components;

trait ButtonCollection
{
    protected $buttons = [];

    public function addButton($button)
    {
        $this->buttons[] = $button;

        return $this;
    }
    public function getButtons()
    {
        return $this->buttons;
    }
}
