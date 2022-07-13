<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $table = 'car_images';

    protected $fillable = [
        'car_id',
        'file_path',
    ];
    public function carImage()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
