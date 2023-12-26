<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'movieId',
        'release_date',
        'synopsis'
    ] ;

    public function wishlist(){
        return $this->belongsTo(Wishlist::class,'movie_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id');
    }

}
