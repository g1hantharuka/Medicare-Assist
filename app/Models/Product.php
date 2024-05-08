<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,softDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'product_category_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    //register media collections
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_images');
    }
}
