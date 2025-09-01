<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $fillable = ['name', 'price', 'category_id']; // example fields

}
