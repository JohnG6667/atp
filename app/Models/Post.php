<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category', 'description'];

    use HasFactory;

    //Relación uno a uno polimórfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
