<?php

namespace config;

use request\Url;

class Config
{

    public static function ROOT_URL(): string
    {
        if (!isset($_ENV['ROOT_URL'])) {
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';

            return Url::sanitize($protocol . $_SERVER['HTTP_HOST']);
        }

        return Url::sanitize($_ENV['ROOT_URL']);
    }

}
