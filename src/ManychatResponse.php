<?php

namespace Juanbenitez\ManychatResponseGenerator;

use Juanbenitez\ManychatResponseGenerator\Exceptions\JsonEncodingError;


class ManychatResponse implements \JsonSerializable
{
    private $version = 'v2';

    private $content;

    public function __construct($messages)
    {
        if ($messages) {
            foreach ($messages as $message) {
                $this->addMessage($message);
            }
        }
        $this->content['actions'] = [];
        $this->content['quick_replies'] = [];
    }

    public static function make($messages)
    {
        return new self($messages);
    }

    public function addMessage($message)
    {
        $this->content['messages'][] = $message;
    }

    public function addAction($action)
    {
        $this->content['actions'][] = $action;
        return $this;
    }

    public function send()
    {
        print($this->toJson(JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));   
    }

    public function toArray()
    {
        $response['messages']      = [];
        $response['actions']       = [];
        $response['quick_replies'] = [];

        if ($this->content) {
            foreach ($this->content['messages'] as $message) {
                $response['messages'][] = $message->toArray();
            }
        }
        if ($this->content['actions']) {
            foreach ($this->content['actions'] as $action) {
                $response['actions'][] = $action->toArray();
            }
        }
        if ($this->content['quick_replies']) {
            foreach ($this->content['quick_replies'] as $qReply) {
                $response['quick_replies'][] = $qReply->toArray();
            }
        }
        return [
            'version' => $this->version,
            'content' => [
                'messages'      => $response['messages'],
                'actions'       => $response['actions'],
                'quick_replies' => []
            ]
        ];
    }

    public function toJson($options = 0)
    {
        $json = json_encode($this, $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingError::forObject($this, json_last_error_msg());
        }

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
