<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTransmission extends Model
{
    protected $table = 'car_transmissions';

    protected $fillable = [
        'transmission_name',
    ];

    public function carssss()
    {
        return $this->belongsTo(Car::class);
    }

}
