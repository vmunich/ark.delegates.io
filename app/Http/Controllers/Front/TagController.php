<?php

namespace App\Http\Controllers\Front;

use Spatie\Tags\Tag;
use App\Models\Delegate;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::simplePaginate();

        return view('front.tags', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $delegates = Delegate::withAnyTags([$tag])->simplePaginate();

        return view('front.delegates', compact('delegates'));
    }
}
