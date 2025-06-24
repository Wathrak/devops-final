<?php

namespace App\Http\Controllers;

use App\Models\TerrainImage;
use App\Http\Requests\StoreTerrainImageRequest;
use App\Http\Requests\UpdateTerrainImageRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TerrainImageController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return TerrainImage::with('terrain')->latest()->get();
    }

    public function store(StoreTerrainImageRequest $request)
    {
        $image = TerrainImage::create($request->validated());
        return response()->json($image, 201);
    }

    public function show(TerrainImage $terrainImage)
    {
        return $terrainImage;
    }

    public function update(UpdateTerrainImageRequest $request, TerrainImage $terrainImage)
    {
        $this->authorize('update', $terrainImage);
        $terrainImage->update($request->validated());

        return response()->json($terrainImage);
    }

    public function destroy(TerrainImage $terrainImage)
    {
        $this->authorize('delete', $terrainImage);
        $terrainImage->delete();

        return response()->noContent();
    }
}
