<?php

    namespace request;

    class Request
    {
        /**
         * @var array
         */
        private $get;

        /**
         * @var array
         */
        private $post;

        public function __construct(array $get = [], array $post = [])
        {
            $this->get = $get;
            $this->post = $post;
        }

        /**
         * @return array
         */
        public function getAllPost(): array
        {
            return $this->post;
        }

        /**
         * @return array
         */
        public function getAllGet(): array
        {
            return $this->get;
        }

        public function issetPost(string $key): bool
        {
            return isset($this->post[$key]);
        }

        public function issetGet(string $key): bool
        {
            return isset($this->get[$key]);
        }

        public function getPost(string $key): string
        {
            return $this->post[$key];
        }

        public function getGet(string $key): string
        {
            return $this->get[$key];
        }

    }