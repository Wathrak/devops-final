<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'payment_method', 'amount_paid',
        'payment_date', 'status', 'transaction_id',
    ];

    public $timestamps = false;

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
