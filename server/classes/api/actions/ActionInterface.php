<?php


    namespace api\actions;

    use request\Request;

    interface ActionInterface
    {

        public function __construct(Request $request);

        public function run(): string;
    }

