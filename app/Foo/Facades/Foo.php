<?php

namespace App\Foo\Facades;

use App\Foo\FakeFooService;
use Illuminate\Support\Facades\Facade;

/**
* @method static string foo(): string
* @method static string fizz(): string
*/
class Foo extends Facade
{
    public static function fake()
    {
        $actual = static::isFake()
            ? static::getFacadeRoot()->actual
            : static::getFacadeRoot();

        tap(new FakeFooService($actual), function ($fake) {
            static::swap($fake);
        });
    }

    protected static function getFacadeAccessor(): string
    {
        return \App\Foo\Contracts\Foo::class;
    }
}
