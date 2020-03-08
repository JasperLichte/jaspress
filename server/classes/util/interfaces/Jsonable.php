<?php

namespace util\interfaces;


abstract class Jsonable implements \JsonSerializable
{

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

}
