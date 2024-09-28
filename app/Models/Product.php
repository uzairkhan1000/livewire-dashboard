<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'sku',
        'product_description',
        'category_id',
        'brand',
        'price',
        'discounted_price',
        'stock_quantity',
        'product_images',
        'product_thumbnail',
        'product_status',
        'attributes_variations',
        'creation_date',
        'last_updated',
        'seo_meta_title',
        'seo_meta_description',
        'seo_friendly_url',
        'featured',
        'tags_keywords',
        'average_rating',
        'number_of_reviews',
        'status',
        'created_by',
        'created_by_name'
    ];

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
