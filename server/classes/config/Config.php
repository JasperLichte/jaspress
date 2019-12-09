<?php

    namespace config;

    class Config
    {

        public const APP_NAME = 'HeavyHawk';

        public static function getRootUrl(): string
        {
            if (isset($_SERVER['HTTPS'])) {
                $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
            } else {
                $protocol = 'http';
            }

            $extraDir = dirname($_SERVER["REQUEST_URI"] . '?');
            $extraDir = explode('/', $extraDir);
            $extraDir = array_filter($extraDir, function ($str) {
                return (bool)$str;
            });
            $extraDir = (string)reset($extraDir);

            return
                $protocol .
                '://' .
                $_SERVER['SERVER_NAME'] .
                '/' .
                $extraDir .
                '/';
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

        public static function API_ROOT_DIR()
        {
            return self::getRootUrl() . 'api/';
        }

    }
