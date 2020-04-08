<?php

namespace application\state;

use application\Environment;
use database\Connection;
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

    public function __construct(Connection $db)
    {
        $this->language = Settings::getInstance($db)->get(LanguageSetting::dbKey())->getValue();
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

}
