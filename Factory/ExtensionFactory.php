<?php

namespace LabZone\Injector\Factory;

use LabZone\Injector\Extension;

/**
 * create extension instance
 */
class ExtensionFactory extends Creator
{
    private static $instance;

    /**
     * get instance of extension factory
     * @return ExtensionFactory
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance=new Self();
        }

        return self::$instance;
    }

    /**
     * create an extension
     * @param  string    $type
     * @return Extension
     */
    public function create($type)
    {
        $items=explode(':', $type);
        $class=current($items).'\\'.next($items).'\\DependencyInjection\\';
        $class.=current($items).'Extension';
        $reflectionClass=new \ReflectionClass($class);

        if ($reflectionClass->isSubclassOf('HotWire\DependencyInjection\Extension')) {
            return $reflectionClass->newInstance();
        }

        return null;
    }
}
