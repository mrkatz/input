<?php

namespace Mrkatz\Input\Facades;

use Illuminate\Support\Facades\Facade;

class input extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'input';
    }
}
