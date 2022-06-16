<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBodyType extends Model
{
    protected $table = 'car_body_types';

    protected $fillable = [
        'body_type_name',
    ];



}
