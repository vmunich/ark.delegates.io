<?php

namespace App\Http\Controllers\Front\Delegate;

use App\Models\Delegate;
use App\Http\Controllers\Controller;

class VoterController extends Controller
{
    public function index(Delegate $delegate)
    {
        $voters = $delegate
            ->voters()
            ->where('balance', '>=', ARKTOSHI)
            ->orderBy('balance', 'desc')
            ->simplePaginate();

        return view('front.delegate.voters.index', compact('delegate', 'voters'));
    }
}
