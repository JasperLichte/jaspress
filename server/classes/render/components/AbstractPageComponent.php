<?php

namespace render\components;


use permissions\Permission;
use request\Url;

abstract class AbstractPageComponent
{

    /** @var bool */
    protected $calledParentInRender = false;

    abstract public static function endPoint(): Url;

    abstract public function permission(): Permission;

}
