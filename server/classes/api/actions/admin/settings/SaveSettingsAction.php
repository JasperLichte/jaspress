<?php

namespace api\actions\admin\settings;

use api\actions\admin\AdminAction;
use api\ApiResponse;
use render\components\pages\admin\SettingsPage;
use settings\Settings;

class SaveSettingsAction extends AdminAction
{

    /** @var Settings */
    private $settings;

    public function __construct()
    {
        parent::__construct();

        $this->settings = Settings::getInstance();
    }

    public function run(): ApiResponse
    {
        $this->saveSettings();

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('All entries saved'),
            SettingsPage::endPoint()
        );
    }

    private function saveSettings()
    {
        foreach ($this->req->getAllPost() as $key => $value) {
            $setting = $this->settings->get($key);
            if ($setting === null) {
                continue;
            }

            if ($value !== $setting->getValue()
                && $setting->validate($value)
            ) {
                $setting->save($this->db, $setting::dbKey(), (string)$value);
            }
        }
    }

}
