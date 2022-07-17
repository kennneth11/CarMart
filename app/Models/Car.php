<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'car_maker_id',
        'car_model_id',
        'body_type_id',
        'transmission_id',
        'fuel_type_id',
        'seller_id',
        'price',
        'millage',
        'description',
        'year_manufactured',
        'status',
        'air_condition',
        'power_steering',
        'power_window',
        'cd_player',
        'leather_seats',
        'central_locking',
        'driver_airbag',
        'passenger_airbag',
        'New_car',
    ];


    public function carImage()
    {
        return $this->hasMany(CarImage::class);
    }
    public function carTransmission()
    {
        return $this->hasOne(CarTransmission::class);
    }
    public function bodyType()
    {
        return $this->hasOne(CarBodyType::class);
    }
    public function fuelType()
    {
        return $this->hasOne(CarFuelType::class);
    }
    public function carModel()
    {
        return $this->hasOne(CarModel::class);
    }
    public function carMaker()
    {
        return $this->hasOne(CarMaker::class);
    }
}
