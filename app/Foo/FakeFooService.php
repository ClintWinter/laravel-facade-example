<?php

namespace App\Foo;

use App\Foo\Contracts\Foo;
use Illuminate\Testing\Assert;

class FakeFooService implements Foo
{
    public int $fooCount = 0;

    public function __construct(public Foo $actual) {}

    public function foo(): string
    {
        $this->fooCount++;

        return 'fake';
    }

    public function fizz(): string
    {
        return 'very fake';
    }

    public function assertFooCount(int $count)
    {
        Assert::assertSame($this->fooCount, $count);
    }
}
