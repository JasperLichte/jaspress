<?php

namespace settings;

use database\Connection;
use settings\categories\SettingsCategory;
use settings\settings\AppNameSetting;
use settings\settings\HeaderImageBannerPosition;
use settings\settings\LanguageSetting;
use settings\settings\ShowHeaderSetting;
use settings\settings\ui\animations\PageLoadAnimationSetting;
use settings\settings\ui\colors\AccentColorSetting;
use settings\settings\ui\colors\BackgroundColorSetting;
use settings\settings\ui\colors\ContentBackgroundColorSetting;
use settings\settings\ui\colors\FontColorSetting;
use settings\settings\ui\colors\FooterBackgroundColorSetting;
use settings\settings\ui\colors\FooterFontColorSetting;
use settings\settings\ui\colors\HeaderBackgroundColorSetting;
use settings\settings\ui\colors\HeaderFontColorSetting;
use settings\settings\ui\ContentWidthSetting;
use settings\settings\ui\ExtraCssUrlSetting;
use settings\settings\ui\HeaderBannerImageWidthSetting;
use settings\settings\ui\HeaderImageFullscreenSetting;
use settings\settings\ui\HeaderStickySetting;
use settings\settings\ui\images\FaviconUrlSetting;
use settings\settings\ui\images\HeaderBannerImageUrlSetting;
use settings\settings\ui\UiScaleSetting;
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

    public static function getInstance(Connection $db): Settings
    {
        if (self::$instance === null) {
            self::$instance = new Settings($db);
        }

        return self::$instance;
    }

    public function __construct(Connection $db)
    {
        $this->db = $db;
        $this->initSettings();
        $this->loadValues();
    }

    private function initSettings(): void
    {
        $this->settings = [
            new AppNameSetting($this->db),
            new LanguageSetting($this->db),
            new BackgroundColorSetting($this->db),
            new ContentBackgroundColorSetting($this->db),
            new FontColorSetting($this->db),
            new HeaderBackgroundColorSetting($this->db),
            new HeaderFontColorSetting($this->db),
            new FooterBackgroundColorSetting($this->db),
            new FooterFontColorSetting($this->db),
            new AccentColorSetting($this->db),
            new PageLoadAnimationSetting($this->db),
            new UiScaleSetting($this->db),
            new ContentWidthSetting($this->db),
            new FaviconUrlSetting($this->db),
            new ExtraCssUrlSetting($this->db),

            new ShowHeaderSetting($this->db),
            new HeaderStickySetting($this->db),
            new HeaderBannerImageUrlSetting($this->db),
            new HeaderBannerImageWidthSetting($this->db),
            new HeaderImageBannerPosition($this->db),
            new HeaderImageFullscreenSetting($this->db),
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

    /** @return UiSetting[]
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

    public function asIndexedArray(): array
    {
        $out = [];
        foreach ($this->settings as $setting) {
            $out[$setting::dbKey()] = $setting;
        }
        return $out;
    }

    /**
     * @param SettingsCategory $category
     * @return BaseSetting[]
     */
    public function getSettingsByCategory(SettingsCategory $category): array
    {
        $settings = [];
        foreach ($this->settings as $setting) {
            if ($setting->getCategory()->getId() === $category->getId()) {
                $settings[] = $setting;
            }
        }

        return $settings;
    }

}
