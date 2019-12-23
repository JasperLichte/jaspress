<?php

    namespace config;

    class Config
    {

        public const APP_NAME = 'HeavyHawk';

        public static function getRootUrl(): string
        {
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';

            //ToDO check if there is a cleaner way
            $domainName = ($_SERVER['HTTP_HOST'] === 'localhost')  ?
                $_SERVER['HTTP_HOST'] . '/' . self::APP_NAME . '/' :
                $_SERVER['HTTP_HOST'] . '/' ;


            return $protocol . $domainName;
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
