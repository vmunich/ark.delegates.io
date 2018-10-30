<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Status as StatusResource;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = QueryBuilder::for(Status::class)
            ->allowedFilters('title', 'body')
            ->jsonPaginate();

        return StatusResource::collection($statuses);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Status $status
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(Status $status)
    {
        return new StatusResource($status);
    }
}
