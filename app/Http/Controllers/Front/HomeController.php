<?php

namespace App\Http\Controllers\Front;

use App\Models\Delegate;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.forging', [
            'delegates' => Delegate::forging()->get(),
        ]);
    }
}
