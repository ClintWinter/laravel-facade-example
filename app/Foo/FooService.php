<?php

namespace App\Foo;

use App\Foo\Contracts\Foo;

class FooService implements Foo
{
    public function foo(): string
    {
        return 'bar';
    }

    public function fizz(): string
    {
        return 'buzz';
    }
}
