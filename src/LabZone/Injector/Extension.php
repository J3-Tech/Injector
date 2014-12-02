<?php

namespace LabZone\Injector;

abstract class Extension
{
    /**
     * container instance
     * @var Container
     */
    protected $container;

    /**
     * set container instance
     */
    public function __construct()
    {
        $this->container=Container::getInstance();
    }

    /**
     * register service if any
     */
    abstract public function load();
}
