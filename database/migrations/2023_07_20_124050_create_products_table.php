<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('sku')->unique();
            $table->text('product_description');
            $table->unsignedBigInteger('category_id');
            $table->string('brand')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->text('product_images')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->enum('product_status', ['active', 'out_of_stock', 'discontinued'])->default('active');
            $table->json('attributes_variations')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('last_updated')->nullable();
            $table->string('seo_meta_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->string('seo_friendly_url')->nullable();
            $table->boolean('featured')->default(false);
            $table->text('tags_keywords')->nullable();
            $table->decimal('average_rating', 3, 2)->nullable();
            $table->unsignedInteger('number_of_reviews')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
