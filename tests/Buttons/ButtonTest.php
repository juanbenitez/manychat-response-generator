<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests\Buttons;

use Juanbenitez\ManychatResponseGenerator\Exceptions\Buttons\InvalidButtonType;
use PHPUnit\Framework\TestCase;

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
