<?php

namespace Tests\Feature;

use App\Foo\Facades\Foo;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FooTest extends TestCase
{
    public function test_foo(): void
    {
        $response = $this->get('/');

        $response->assertJson(fn (AssertableJson $json)
            => $json->where('foo', 'bar'));
    }

    public function test_fake_foo(): void
    {
        Foo::fake();

        $response = $this->get('/');

        $response->assertJson(fn (AssertableJson $json)
            => $json->where('foo', 'fake'));
    }

    public function test_incrementor(): void
    {
        Foo::fake();

        Foo::foo();
        Foo::foo();
        Foo::foo();

        Foo::assertFooCount(3);
    }
}
