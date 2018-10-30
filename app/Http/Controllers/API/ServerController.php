<?php

namespace App\Http\Controllers\API;

use App\Models\Server;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Server as ServerResource;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = QueryBuilder::for(Server::class)
            ->allowedFilters('type', 'network', 'cpu', 'ram', 'disk', 'connection')
            ->jsonPaginate();

        return ServerResource::collection($servers);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Server $server
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(Server $server)
    {
        return new ServerResource($server);
    }
}
