<?php

namespace App\Http\Controllers;

use App\Foo\Facades\Foo;

class FooController extends Controller
{
    public function index()
    {
        return response()->json([
            'foo' => Foo::foo(),
        ]);
    }
}
