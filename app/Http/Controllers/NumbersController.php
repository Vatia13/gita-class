<?php

namespace App\Http\Controllers;

use App\Contracts\NumberInterface;

class NumbersController extends Controller
{
    public function test()
    {
        return app(NumberInterface::class)->get();
    }
}
