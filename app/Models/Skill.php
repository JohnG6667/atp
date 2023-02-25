<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'level'];

    use HasFactory;

    //Relación uno a uno polimórfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
