<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car_models';

    protected $fillable = [
        'car_maker_id',
        'car_model_name',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
