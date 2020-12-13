<?php

namespace Juanbenitez\ManychatResponseGenerator\Components;

use Juanbenitez\ManychatResponseGenerator\Exceptions\ValidationError;
use Juanbenitez\ManychatResponseGenerator\Exceptions\EmptyRequiredAttribute;

class Card
{
    use MediaComponent, ButtonCollection;

    const TITLE_MAX_LENGHT = 80;
    const SUBTITLE_MAX_LENGHT = 80;
    const VALID_IMAGE_EXTENSIONS = ['png', 'gif', 'jpg'];

    protected $title;
    protected $subtitle;
    protected $actionUrl;

    protected function __construct($title, $subtitle = '', $image_url = '', $action_url = '')
    {
        $this->setTitle($title);
        $this->setSubtitle($subtitle);
        $this->checkExtension(
            $this->getMediaExtension($image_url),
            self::VALID_IMAGE_EXTENSIONS
        );
        $this->setUrl($image_url);
        $this->setActionUrl($action_url);

    }

    public static function make($title, $subtitle = '', $image_url = '', $action_url = '')
    {
        return new self($title, $subtitle, $image_url, $action_url);
    }

    public function setTitle($title)
    {
        if ($title == '') {
            throw EmptyRequiredAttribute::from('title');
        }
        if (strlen($title) > self::TITLE_MAX_LENGHT) {
            throw ValidationError::withMessage(
                sprintf('Title is too long, max. lenght is %s', self::TITLE_MAX_LENGHT)
            );
        }
        $this->title = $title;
    }

    public function setSubtitle($subtitle)
    {
        /* if ($subtitle == '') {
            throw EmptyRequiredAttribute::from('subtitle');
        } */
        if (strlen($subtitle) > self::SUBTITLE_MAX_LENGHT) {
            throw ValidationError::withMessage(
                sprintf('SubTitle is too long, max. lenght is %s', self::SUBTITLE_MAX_LENGHT)
            );
        }
        $this->subtitle = $subtitle;
        return $this;
    }

    public function setActionUrl($actionUrl)
    {
        $this->actionUrl = $actionUrl;
        return $this;
    }

    public function toArray(): array
    {
        $structure = [
            'title'     => $this->title,
            'subtitle'  => $this->subtitle,
            'image_url' => $this->url,
            'action_url' => $this->actionUrl,
        ];
        if (!empty($this->buttons)) {
            foreach ($this->buttons as $button) {
                $structure['buttons'][] = $button->toArray();
            }
        }

        return $structure;
    }

}
