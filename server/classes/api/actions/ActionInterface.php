<?php


    namespace api\actions;

    use helper\Request;

    interface ActionInterface
    {

        public function __construct(Request $request);

        public function run(): string;
    }

