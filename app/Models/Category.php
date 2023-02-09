<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['name', 'image_url', 'desc'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
