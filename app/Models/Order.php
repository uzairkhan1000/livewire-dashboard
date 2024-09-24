<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function color() {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }

    public function size() {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
}
