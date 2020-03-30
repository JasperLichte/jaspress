<?php

namespace application\state;

use application\Environment;
use DateTime;
use request\Url;
use settings\Settings;
use settings\settings\LanguageSetting;
use util\exceptions\InvalidArgumentsException;

class Ui
{

    /** @var string */
    private $title = '';

    /** @var string */
    private $language = '';

    /** @var Url */
    private $customCssFileUrl = null;

    public function __construct()
    {
        $this->language = Settings::getInstance()->get(LanguageSetting::dbKey())->getValue();

        try {
            $appId = Environment::getInstance()->get('APP_ID');
            $this->customCssFileUrl = Url::css('/custom/' . $appId . '.css');
        } catch (InvalidArgumentsException $e) {
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Ui
    {
        $this->title = $title;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getCurrentDate(): DateTime
    {
        return new DateTime();
    }

    public function getCustomCssFileUrl(): ?Url
    {
        return $this->customCssFileUrl;
    }

}
