<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Review::with('terrain', 'user')->latest()->get();
    }

    public function store(StoreReviewRequest $request)
    {
        $review = Review::create([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);

        return response()->json($review, 201);
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $this->authorize('update', $review);
        $review->update($request->validated());

        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();

        return response()->noContent();
    }
}
