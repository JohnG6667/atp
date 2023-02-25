<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'description'];

    use HasFactory;

    //Relación uno a uno polimórfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
