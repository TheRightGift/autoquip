<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['title', 'shipping_price', 'desc', 'amount', 'stock', 'recommended', 'category_id', 'created_at', 'deleted_at', 'updated_at'];

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
