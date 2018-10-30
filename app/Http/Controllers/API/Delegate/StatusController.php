<?php

namespace App\Http\Controllers\API\Delegate;

use App\Models\Status;
use App\Models\Delegate;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Status as StatusResource;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Delegate $delegate
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Delegate $delegate)
    {
        $statuses = QueryBuilder::for(Status::class)
            ->allowedFilters('title', 'body')
            ->where('delegate_id', $delegate->id)
            ->jsonPaginate();

        return StatusResource::collection($statuses);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Delegate $delegate
     * @param \App\Models\Status   $status
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(Delegate $delegate, Status $status)
    {
        return new StatusResource($status);
    }
}
