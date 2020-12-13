<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests;

use Juanbenitez\ManychatResponseGenerator\Exceptions\InvalidMessageType;
use Juanbenitez\ManychatResponseGenerator\Tests\Messages\SomeMessage;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    /** @test */
    public function canNotCreateInvalidMessageType()
    {
        $this->expectException(InvalidMessageType::class);
        new SomeMessage('invalidType');
    }

    /** @test */
    public function canCreateValidMessageType()
    {
        $this->assertInstanceOf(SomeMessage::class, new SomeMessage('file'));
        $this->assertInstanceOf(SomeMessage::class, new SomeMessage('audio'));
        $this->assertInstanceOf(SomeMessage::class, new SomeMessage('video'));
        $this->assertInstanceOf(SomeMessage::class, new SomeMessage('text'));
        $this->assertInstanceOf(SomeMessage::class, new SomeMessage('image'));
    }
}
