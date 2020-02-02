<?php

namespace util\interfaces;


interface Serializable
{

    public function deserialize(array $input): Serializable;

}
