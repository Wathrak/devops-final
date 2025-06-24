<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Favorite;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Terrain;
use App\Models\TerrainImage;
use App\Policies\BookingPolicy;
use App\Policies\FavoritePolicy;
use App\Policies\PaymentPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\TerrainImagePolicy;
use App\Policies\TerrainPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected $policies = [
        Terrain::class => TerrainPolicy::class,
        TerrainImage::class => TerrainImagePolicy::class,
        Booking::class => BookingPolicy::class,
        Payment::class => PaymentPolicy::class,
        Review::class => ReviewPolicy::class,
        Favorite::class => FavoritePolicy::class,
    ];
}
