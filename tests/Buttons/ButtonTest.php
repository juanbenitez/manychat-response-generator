<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests\Buttons;

use PHPUnit\Framework\TestCase;
use Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons\InvalidButtonType;

class ButtonTest extends TestCase
{
    /** @test */
    public function canNotCreateInvalidButtonType()
    {
        $this->expectException(InvalidButtonType::class);
        new SomeButton('invalidType', 'Caption');
    }

    /** @test */
    public function canCreateValidButtonsType()
    {
        $this->assertInstanceOf(SomeButton::class, new SomeButton('url', 'Caption'));
        $this->assertInstanceOf(SomeButton::class, new SomeButton('call', 'Caption'));
    }
}
