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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // BIGINT, UNSIGNED, AUTO_INCREMENT, PRIMARY KEY
            $table->string('name', 255); // VARCHAR(255), NOT NULL
            $table->string('email', 255)->unique(); // UNIQUE, NOT NULL
            $table->text('address')->nullable(); // TEXT, NULLABLE
            $table->timestamps(); // created_at & updated_at, NULLABLE by default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
