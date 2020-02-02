<?php

namespace request;

class Url
{

    /** @var string */
    private $path = '';

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
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

}
