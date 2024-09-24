<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'color_id']; // Include 'code' in the $fillable array

    public function color() {
        return $this->belongsTo(Color::class);
    }
}
