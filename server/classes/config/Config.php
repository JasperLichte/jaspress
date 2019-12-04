<?php

namespace config;

class Config {

    public static function getRootUrl(): string {
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return
            $protocol .
            '://' .
            $_SERVER['SERVER_NAME'] .
            dirname($_SERVER["REQUEST_URI"] . '?')
            . '/';
    }


    /**
     * @return string
     */
    public static function STYLES_ROOT_DIR()
    {
        return self::getRootUrl() . 'client/css/';
    }

    public static function SCRIPTS_ROOT_DIR()
    {
        return self::getRootUrl() . 'client/js/';
    }
}
