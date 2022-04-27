<?php

namespace App\Http\Controllers;

# Requests
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;

# Services
use App\Services\PlayerService;

# Resources
use App\Http\Resources\PlayerResource;
use App\Http\Resources\StorePlayerResource;
use App\Http\Resources\ShowPlayerResource;
use App\Http\Resources\EditPlayerResource;
use App\Http\Resources\UpdatePlayerResource;

class PlayerController extends Controller
{
    public function __construct(private PlayerService $playerService) {}

    public function index()
    {
        return PlayerResource::collection($this->playerService->getPlayers());
    }

    public function store(StorePlayerRequest $request)
    {
        $response = new StorePlayerResource($this->playerService->storePlayer($request));

        return response()->json($response);
    }

    public function show($id)
    {
        $response = new ShowPlayerResource($this->playerService->showPlayer($id));

        return response()->json($response);
    }

    public function create()
    {
        return response()->json([
            'metrics' => config('player.metric'),
        ]);
    }

    public function edit($id)
    {
        $response = new EditPlayerResource($this->playerService->showPlayer($id));

        return response()->json($response);
    }

    public function update(UpdatePlayerRequest $request, $id)
    {
        $response = new UpdatePlayerResource($this->playerService->updatePlayer($request, $id));

        return response()->json($response);
    }

    public function destroy($id)
    {
        return response()->json([
            'deleted' => $this->playerService->deletePlayer($id),
        ]);
    }
}
