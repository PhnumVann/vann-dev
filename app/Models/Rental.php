<?php

namespace App\Models;

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
        ];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
