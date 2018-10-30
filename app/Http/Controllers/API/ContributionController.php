<?php

namespace App\Http\Controllers\API;

use App\Models\Contribution;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Contribution as ContributionResource;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributions = QueryBuilder::for(Contribution::class)
            ->allowedFilters('title', 'body')
            ->jsonPaginate();

        return ContributionResource::collection($contributions);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contribution $contribution
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(Contribution $contribution)
    {
        return new ContributionResource($contribution);
    }
}
