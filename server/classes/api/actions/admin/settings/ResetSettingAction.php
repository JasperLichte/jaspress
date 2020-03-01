<?php

namespace api\actions\admin\settings;

use api\actions\admin\AdminAction;
use api\ApiResponse;
use render\components\pages\admin\SettingsPage;
use settings\Settings;

class ResetSettingAction extends AdminAction
{

    public function run(): ApiResponse
    {
        $key = ($this->req->issetGet('key') ? $this->req->getGet('key') : '');
        if (empty($key)) {
            return $this->res->setErrorMessage('Paramater "key" cannot be empty');
        }

        $setting = Settings::getInstance()->get($key);
        if ($setting === null) {
            return $this->res->setErrorMessage('Invalid key');
        }

        $setting::delete($this->db, $key);

        $this->req->redirectTo(SettingsPage::endPoint());
        return $this->res->setSuccessMessage('Setting ' . $key . ' removed');
    }

}
