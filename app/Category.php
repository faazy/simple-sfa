<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['code', 'name', 'parent_id', 'created_at', 'updated_at'];


    public function subCategories()
    {

    }

    public function scopeMain()
    {
        return $this->whereNull('parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
