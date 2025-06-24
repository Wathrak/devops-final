<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Booking::with('terrain', 'renter')->latest()->get();
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create([
            ...$request->validated(),
            'renter_id' => Auth::id(),
        ]);

        return response()->json($booking, 201);
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return $booking->load('terrain', 'renter');
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $this->authorize('update', $booking);
        $booking->update($request->validated());

        return response()->json($booking);
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        $booking->delete();

        return response()->noContent();
    }
}
