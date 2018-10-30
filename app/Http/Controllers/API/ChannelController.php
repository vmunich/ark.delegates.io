<?php

namespace App\Http\Controllers\API;

use App\Models\Channel;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Channel as ChannelResource;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = QueryBuilder::for(Channel::class)
            ->allowedFilters('name', 'handle', 'location')
            ->jsonPaginate();

        return ChannelResource::collection($channels);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Channel $channel
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(Channel $channel)
    {
        return new ChannelResource($channel);
    }
}
