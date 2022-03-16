<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\Facade;

class Authentication extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'authentication';
    }
}
