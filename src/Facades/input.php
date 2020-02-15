<?php

namespace Mrkatz\Input\Facades;

use Illuminate\Support\Facades\Facade;

class Input extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Input';
    }
}
