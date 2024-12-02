<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'car_id',
            'type',
            'description',
            'cost',
            'maintenance_date'
        ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}