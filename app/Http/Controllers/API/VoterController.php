<?php

namespace App\Http\Controllers\API;

use App\Models\Voter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Voter as VoterResource;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = QueryBuilder::for(Voter::class)
            ->allowedFilters('address', 'balance', 'is_excluded')
            ->jsonPaginate();

        return VoterResource::collection($voters);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Voter $voter
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(Voter $voter)
    {
        return new VoterResource($voter);
    }
}
