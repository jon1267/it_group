<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // это жанры (категории) фильмов.
    protected $table='categories';

    protected $fillable = ['title'];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
