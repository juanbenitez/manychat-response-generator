<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests\Messages;

use PHPUnit\Framework\TestCase;
use Juanbenitez\ManychatResponseGenerator\Messages\Text;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Call;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Url;
use Juanbenitez\ManychatResponseGenerator\Exceptions\TextMessage\InvalidEmptyText;

class TextMessageTest extends TestCase
{
    /** @test */
    public function canBeCreatedFromValidText()
    {
        $textMessage = Text::make('hello world');

        $this->assertInstanceOf(
            Text::class,
            $textMessage
        );
        $this->assertEquals('hello world', $textMessage->getText());
    }

    /** @test */
    public function canNotBeCreatedFromEmptyText()
    {
        $this->expectException(InvalidEmptyText::class);
        Text::make('');
    }

    /** @test */
    public function canBeCreatedWithButtons()
    {
        $textMessage = Text::make('hello world')
            ->addButton(Call::make('Caption', '423424324'))
            ->addButton(Url::make('Caption', 'https://sdsad.com'));
        $this->assertInstanceOf(
            Text::class,
            $textMessage
        );
        $this->assertNotEmpty($textMessage->getButtons());
    }

    /** @test */
    public function canBeConvertedToArray()
    {
        $textMock = [
            'type' => 'text',
            'text' => 'hello world'
        ];

        $textWithButtonsMock = [
            'type' => 'text',
            'text' => 'hello world',
            'buttons' => [
                [
                    'type' => 'call',
                    'caption' => 'Caption1',
                    'phone' => '123456789',
                ],
                [
                    'type' => 'url',
                    'caption' => 'Caption2',
                    'url' => 'https://google.com',
                ]
            ]
        ];

        $textMessage = Text::make('hello world');

        $this->assertIsArray($textMessage->toArray());
        $this->assertSame($textMock, $textMessage->toArray());

        $textMessage->addButton(Call::make('Caption1', '123456789'))
            ->addButton(Url::make('Caption2', 'https://google.com'));

        $this->assertSame($textWithButtonsMock, $textMessage->toArray());
    }
}
