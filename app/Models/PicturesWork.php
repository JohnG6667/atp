<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicturesWork extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relación uno a uno polimórfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
