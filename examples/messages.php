<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Call;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Dynamic;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Flow;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Node;
use Juanbenitez\ManychatResponseGenerator\Components\Buttons\Url;
use Juanbenitez\ManychatResponseGenerator\Components\Card;
use Juanbenitez\ManychatResponseGenerator\ManychatResponse;
use Juanbenitez\ManychatResponseGenerator\Messages\Cards;
use Juanbenitez\ManychatResponseGenerator\Messages\Message;
use Juanbenitez\ManychatResponseGenerator\Messages\Text;

class AnyMessage extends Message
{
    public function __construct($type)
    {
        parent::__construct($type);
    }
    public function toArray()
    {
        //
    }
}

//$m = new AnyMessage('any');
//var_dump($m);
ManychatResponse::make(
    [
        Text::make('hello world')
            ->addButton(Call::make('Caption', '423424324'))
            ->addButton(Url::make('Caption', 'https://sdsad.com')),
        
    ]
)->toJson(JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

ManychatResponse::make(
    [
        Cards::make()
            ->addCard(
                Card::make('titulo card1')
                        ->setSubtitle('subtitulo1')
                        ->addButton(Call::make('Caption1', '423424324'))
                        ->addButton(Url::make('Caption1', 'https://sdsad.com'))
            )
            ->addCard(
                Card::make('titulo card2')
                        ->setSubtitle('subtitulo2')
                        ->addButton(Node::make('Caption2', 'content 1'))
                        ->addButton(Flow::make('Caption2', 'content123'))
            )
            ->addCard(
                Card::make('dinamica')
                        ->setSubtitle('callback')
                        ->addButton(
                            Dynamic::make('Caption2', 'https:dasda')
                                    ->addHeader('x-header', '{{value1}}')
                                    ->addHeader('x-header2', 'value2')
                                    //->addPayload('pay1', 'dasdas')
                        )
            ),
    ]
)->send();

//print_r($resp);
die();

$textMessage = Text::make('hello world')
    ->addButton(Call::make('Caption', '423424324'))
    ->addButton(Url::make('Caption', 'https://sdsad.com'));

print_r($textMessage->toArray());
