<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMaker extends Model
{
    protected $table = 'car_makers';

    protected $fillable = [
        'car_maker_name',
        'file_path_picture',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function carss(){
        return $this->hasMany(Car::class);
    }


}
