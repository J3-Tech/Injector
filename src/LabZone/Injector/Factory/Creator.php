<?php

namespace LabZone\Injector\Factory;

abstract class Creator
{
    protected function __construct() { }

    protected function __clone() { }

    abstract public function create($name);
}
