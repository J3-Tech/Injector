<?php

namespace LabZone\Injector\Exception;

use Exception;

class ServiceNotFoundException extends Exception
{
    public function __construct($service)
    {
        $this->message="{$service} service not found";
    }
}
