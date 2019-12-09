<?php

    namespace api\actions;

    use helper\Request;

    class Action implements ActionInterface
    {

        /**
         * @var int
         */
        protected $statusCode = 200;

        /**
         * @var Request
         */
        protected $request;

        /**
         * @var string
         */
        protected $contentType = 'application/json';

        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        protected function setStatusCode(int $statusCode): void
        {
            $this->statusCode = $statusCode;
        }

        protected function setContentType(string $contentType)
        {
            header('Content-Type: ' . (string)$contentType);
        }

        public function getStatusCode(): int
        {
            return $this->statusCode;
        }

        public function run(): string
        {
            return '';
        }
    }