<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Favorite::with('terrain')->where('user_id', Auth::id())->get();
    }

    public function store(StoreFavoriteRequest $request)
    {
        $favorite = Favorite::create([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);

        return response()->json($favorite, 201);
    }

    public function destroy(Favorite $favorite)
    {
        $this->authorize('delete', $favorite);
        $favorite->delete();

        return response()->noContent();
    }
}
