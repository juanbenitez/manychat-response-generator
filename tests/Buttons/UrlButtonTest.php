<?php

namespace Juanbenitez\ManychatResponseGenerator\Tests\Buttons;

use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Url;
use Juanbenitez\ManychatResponseGenerator\Exceptions\EmptyRequiredAttribute;
use PHPUnit\Framework\TestCase;

class UrlButtonTest extends TestCase
{
    /** @test */
    public function canBeCreatedWithRequiredAttributes()
    {
        $this->assertInstanceOf(
            Url::class,
            Url::make('Caption Button', 'https://google.com', 'full')
        );

        $this->assertInstanceOf(
            Url::class,
            Url::make('Caption Button', 'https://google.com')
        );
    }

    /** @test */
    public function canNotBeCreatedWithoutRequiredAttributes()
    {
        $this->expectException(EmptyRequiredAttribute::class);
        $this->expectErrorMessage('Required attribute is empty: url');
        Url::make('Caption Button', '');

        $this->expectException(EmptyRequiredAttribute::class);
        $this->expectErrorMessage('Required attribute is empty: caption');
        Url::make('', 'http://google.com');
    }
}
