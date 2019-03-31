<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code', 'name', 'category_id', 'subcategory_id', 'supplier_id',
        'cost', 'price', 'image', 'alert_quantity', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //Categorized Products
    public function scopeCategorized($query, Category $category = null)
    {
        if (is_null($category)) return $query->with('categories');

        $categoryIds = $category->getDescendantsAndSelf()->lists('id');

        return $query->with('categories')
            ->where('category_id', $categoryIds);
    }
}
