<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'publish', 'catalog_id', 'img'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function publish(Integer $id)
    {
        return $this->where('id', $id)
            ->update(['publish' => 1]);
    }

    public function unPublish(Integer $id)
    {
        return $this->where('id', $id)
            ->update(['publish' => 0]);
    }
}
