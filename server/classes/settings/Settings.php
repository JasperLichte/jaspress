<?php

namespace settings;

use settings\settings\AppNameSetting;
use settings\settings\LanguageSetting;

class Settings
{

    /**
     * @var Settings
     */
    private static $instance = null;

    /**
     * @var BaseSetting[]
     */
    private $settings = [];

    public static function getInstance(): Settings
    {
        if (self::$instance === null) {
            self::$instance = new Settings();
        }

        return self::$instance;
    }

    public function __construct()
    {
       $this->initSettings();
       $this->loadValues();
    }

    private function initSettings(): void
    {
        $this->settings = [
            new AppNameSetting(),
            new LanguageSetting(),
        ];
    }

    private function loadValues(): void
    {
        // TODO load settings from db, assign them to the corresponding `Setting` object in `$this->settings`
    }

    public function byKey(string $dbKey): ?BaseSetting
    {
        foreach ($this->settings as $setting) {
            if ($setting::DB_KEY === $dbKey) {
                return $setting;
            }
        }
        return null;
    }

}
