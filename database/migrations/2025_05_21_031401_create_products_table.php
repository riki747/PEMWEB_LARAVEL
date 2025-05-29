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
             $table->id(); // id: unsignedBigInteger, Primary Key, Auto-increment

            $table->string('name', 255); // name: required, max 255
            $table->string('slug', 255)->unique(); // slug: unique index, SEO-friendly
            $table->text('description')->nullable(); // description: boleh kosong
            $table->string('sku', 50)->unique(); // sku: unique, max 50

            $table->decimal('price', 10, 2)->default(0); // price: ≥ 0
            $table->integer('stock')->default(0); // stock: ≥ 0

            $table->unsignedBigInteger('product_category_id')->nullable(); // FK ke product_categories
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->string('image_url', 255)->nullable(); // image_url: URL gambar
            $table->boolean('is_active')->default(true); // aktif/tidaknya produk

            $table->timestamps(); // created_at dan updated_at
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
