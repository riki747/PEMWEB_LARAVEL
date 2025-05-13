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
            $table->id(); // sama aja kayak BIGINT, UNSIGNED, AUTO_INCREMENT, PRIMARY KEY
            $table->string('name'); // defaultnya 255 karakter dan NOT NULL
            $table->string('email')->unique(); // UNIQUE + NOT NULL
            $table->text('address')->nullable(); // NULLABLE
            $table->timestamps(); // otomatis bikin created_at & updated_at nullable
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
