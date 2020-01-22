<?php

    namespace config;

    class Config
    {

        public static function ROOT_URL(): string
        {
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';

            //ToDO check if there is a cleaner way
            $domainName = $_SERVER['HTTP_HOST'] . '/' ;

            return $protocol . $domainName;
        }

        public static function STYLES_ROOT_DIR() : string
        {
            return self::ROOT_URL() . 'client/css/';
        }

        public static function SCRIPTS_ROOT_DIR() : string
        {
            return self::ROOT_URL() . 'client/js/';
        }

        public static function API_ROOT_DIR() : string
        {
            return self::ROOT_URL() . 'api/';
        }

    }
