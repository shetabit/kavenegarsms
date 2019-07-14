<?php

namespace Shetabit\KavenegarSms\Facades;

use Illuminate\Support\Facades\Facade;

class KavenegarSms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kavenegarsms';
    }
}
