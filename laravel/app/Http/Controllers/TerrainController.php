<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Http\Requests\StoreTerrainRequest;
use App\Http\Requests\UpdateTerrainRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TerrainController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        return Terrain::with('owner', 'images')->latest()->get();
    }

    public function store(StoreTerrainRequest $request)
    {
        $terrain = Terrain::create([
            ...$request->validated(),
            'owner_id' => Auth::id(),
        ]);

        return response()->json($terrain, 201);
    }

    public function show(Terrain $terrain)
    {
        return $terrain->load('owner', 'images');
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $this->authorize('update', $terrain);
        $terrain->update($request->validated());

        return response()->json($terrain);
    }

    public function destroy(Terrain $terrain)
    {
        $this->authorize('delete', $terrain);
        $terrain->delete();

        return response()->noContent();
    }
}
