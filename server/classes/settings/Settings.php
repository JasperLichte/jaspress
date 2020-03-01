<?php

namespace settings;

use database\Connection;
use settings\settings\AppNameSetting;
use settings\settings\LanguageSetting;
use settings\settings\ui\colors\BackgroundColorSetting;
use settings\settings\ui\colors\HeaderBackgroundColorSetting;
use settings\settings\ui\UiSetting;

class Settings
{

    /**
     * @var Settings
     */
    private static $instance = null;

    /** @var BaseSetting[] */
    private $settings = [];

    /** @var Connection */
    private $db;

    public static function getInstance(): Settings
    {
        if (self::$instance === null) {
            self::$instance = new Settings();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->db = Connection::getInstance();
        $this->initSettings();
        $this->loadValues();
    }

    private function initSettings(): void
    {
        $this->settings = [
            new AppNameSetting(),
            new LanguageSetting(),
            new BackgroundColorSetting(),
            new HeaderBackgroundColorSetting(),
        ];
    }

    private function loadValues(): void
    {
        foreach ($this->db->getPdo()->query('SELECT id, value FROM settings')->fetchAll() as $data) {
            $setting = $this->get($data['id']);
            if ($setting === null) {
                continue;
            }
            $setting->setValue($data['value']);
        }
    }

    public function get(string $dbKey): ?BaseSetting
    {
        foreach ($this->settings as $setting) {
            if ($setting::dbKey() === $dbKey) {
                return $setting;
            }
        }
        return null;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @return UiSetting[]
     */
    public function getUiSettings(): array
    {
        $uiSettings = [];
        foreach ($this->settings as $setting) {
            if ($setting instanceof UiSetting) {
                $uiSettings[] = $setting;
            }
        }

        return $uiSettings;
    }

}
