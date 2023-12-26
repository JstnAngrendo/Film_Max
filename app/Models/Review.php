<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'author',
        'reviewTitle',
        'reviewDesc',
        'release_date'
    ] ;
    protected $dates = ['release_date'];
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
