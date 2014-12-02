<?php

namespace LabZone\Injector;

use LabZone\Injector\Factory\Creator;
use LabZone\Injector\Exception\ServiceNotFoundException;

/**
 * Dependency injection container
 */
class Container extends Creator
{
    /**
     * service instances
     * @var array
     */
    private static $instances=array();

    /**
     * Container instance
     * @var Container
     */
    private static $instance;

    /**
     * get container instance
     * @return Container
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance=new Container();
        }

        return self::$instance;
    }

    /**
     * create new service
     * @param  string $className
     * @return object
     */
    public function create($className)
    {
        if (isset($this->instances[$className])) {
            return $this->instances[$classNames];
        }

        $class=new \ReflectionClass($className);
        $constructor=$class->getConstructor();

        return $class->newInstance();
    }

    /**
     * register new service
     * @param  string $service  unique name
     * @param  object $callback
     * @return self
     */
    public function register($service,$callback)
    {
        self::$instances[$service]=$callback;

        return $this;
    }

    /**
     * get service
     * @param  string                   $service unique service name
     * @return object                   service requested
     * @throws ServiceNotFoundException If Service not found
     */
    public function get($service)
    {
        if (isset(self::$instances[$service])) {
            return self::$instances[$service];
        }

        throw new ServiceNotFoundException($service);
    }
}
