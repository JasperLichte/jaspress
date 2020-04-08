<?php

namespace config;

use application\Environment;
use render\controller\RenderController;
use request\Url;
use util\exceptions\InvalidArgumentsException;

class ClientCustomizer
{

    /** @var Environment */
    private $env;

    /** @var string */
    private $appId;

    /** @var Url */
    private $customCssFileUrl = null;

    /** @var Url */
    private $customJsFileUrl;

    /** @var RenderController */
    private $renderController;

    /** @var string */
    private $customHeader = null;

    public function __construct(Environment $env, RenderController $renderController)
    {
        $this->env = $env;
        $this->renderController = $renderController;

        try {
            $this->appId = $this->env->get('APP_ID');

            $this->customCssFileUrl = Url::css('/custom/' . $this->appId . '.css');
            $this->customJsFileUrl = Url::js('/custom/' . $this->appId . '.js');
        } catch (InvalidArgumentsException $e) {}
    }

    public function getCustomCssFileUrl(): ?Url
    {
        return $this->customCssFileUrl;
    }

    public function getCustomJsFileUrl(): Url
    {
        return $this->customJsFileUrl;
    }

    private function initCustomHeader()
    {
        $this->customHeader = $this->renderController->render('@custom/' . $this->appId . '/header');
    }

    public function customHeaderExists(): bool
    {
        if ($this->customHeader == null) {
            $this->initCustomHeader();
        }
        return strlen($this->customHeader) > 0;
    }

    public function getCustomHeader(): string
    {
        if ($this->customHeader == null) {
            $this->initCustomHeader();
        }
        return $this->customHeader;
    }

}
