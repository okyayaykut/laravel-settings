<?php

namespace okyayaykut\LaravelConfig;

use Illuminate\Support\Facades\Facade;

class LaravelConfigFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelConfig';
    }
}