<?php

namespace request;

use config\Config;

class Url
{

    /** @var string */
    private $path = '';

    public function __construct(string $path = '')
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return Url::sanitize($this->path);
    }

    public function setPath(string $path): Url
    {
        $this->path = $path;

        return $this;
    }

    public function addGetParams(array $params): Url
    {
        $urlParts = parse_url($this->getPath());

        if (isset($url_parts['query'])) {
            parse_str($urlParts['query'], $params);
        } else {
            $params = [];
        }

        $urlParts['query'] = http_build_query($params);
        $this->setPath(http_build_url($urlParts));

        return $this;
    }

    public static function to(string $path): Url
    {
        $url = new Url($path);
        $url->prepend(Config::ROOT_URL());
        return $url;
    }

    public function prepend($path): Url
    {
        $this->setPath($path . $this->path);

        return $this;
    }

    public function append($path): Url
    {
        $this->setPath($this->getPath() . $path);

        return $this;
    }

    public static function sanitize(string $path): string
    {
        return filter_var($path, FILTER_VALIDATE_URL);
    }

    public function __toString()
    {
        return $this->getPath();
    }

}
