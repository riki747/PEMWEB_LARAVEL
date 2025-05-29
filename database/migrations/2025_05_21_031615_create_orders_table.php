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
        Schema::create('orders', function (Blueprint $table) {
        $table->id(); // id: BIGINT, UNSIGNED, PRIMARY KEY, AUTO_INCREMENT

        $table->unsignedBigInteger('customer_id'); // customer_id: BIGINT, UNSIGNED, NOT NULL
        $table->foreign('customer_id')
              ->references('id')
              ->on('customers');

        $table->date('order_date'); // DATE, NOT NULL

        $table->decimal('total_amount', 10, 2)->default(0.00); // DECIMAL(10,2), DEFAULT 0.00

        $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending'); // ENUM

        $table->timestamp('created_at')->nullable(); // TIMESTAMP NULLABLE
        $table->timestamp('updated_at')->nullable(); // TIMESTAMP NULLABLE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
