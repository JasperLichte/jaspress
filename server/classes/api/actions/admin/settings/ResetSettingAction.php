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
            return $this->req->reloadWith($this->res->setErrorMessage('Paramater "key" cannot be empty'));
        }

        $setting = Settings::getInstance()->get($key);
        if ($setting === null) {
            return $this->req->reloadWith($this->res->setErrorMessage('Invalid key'));
        }

        $setting::delete($this->db, $key);

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('Setting ' . $key . ' removed'),
            SettingsPage::endPoint()
        );
    }

}
