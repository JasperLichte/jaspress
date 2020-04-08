<?php

namespace render\components;


use application\AppContainer;
use permissions\Permission;
use request\Url;

abstract class AbstractPageComponent extends AppContainer
{

    /** @var bool */
    protected $calledParentInRender = false;

    abstract public static function endPoint(): Url;

    abstract public function permission(): Permission;

}
