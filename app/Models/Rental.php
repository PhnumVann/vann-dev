<?php

namespace App\Models;

use App\Enums\RentalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'car_id',
            'customer_id',
            'start_date',
            'end_date',
            'rental_rate',
            'insurance_charge',
            'fuel_charge',
            'total_charge',
            'status',
            'payment_status',
        ];
    protected $casts = [
        'status' => RentalStatus::class,
    ];

    public function isPending() : bool
    {
        return $this->status == RentalStatus::pending->value;
    }

    public function isRented() : bool
    {
        return $this->status == RentalStatus::rented->value;
    }

    public function isReturned() : bool
    {
        return $this->status == RentalStatus::returned->value;
    }

    public function isPaid() : bool
    {
        return $this->payment_status == RentalStatus::paid->value;
    }

    public function isUnpaid() : bool
    {
        return $this->payment_status == RentalStatus::unpaid->value;
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
