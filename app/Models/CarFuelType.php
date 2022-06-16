<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFuelType extends Model
{
    protected $table = 'car_fuel_types';

    protected $fillable = [
        'fuel_type_name',
    ];
}
