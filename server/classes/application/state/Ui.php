<?php

namespace application\state;

use settings\Settings;
use settings\settings\LanguageSetting;

class Ui
{

    /** @var string */
    private $title = '';

    /** @var string */
    private $language = '';

    public function __construct()
    {
        $this->language = Settings::getInstance()->get(LanguageSetting::dbKey())->getValue();
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

}
