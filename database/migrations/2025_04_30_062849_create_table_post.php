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
        Schema::create(table:'post', callback:function (Blueprint $table) {
            $table->id();
            $table->string(column:'title');
            $table->text(column:'content');
            $table->string(column:'slug')->unique();
            $table->foreignId(column:'user_id')->constrained(table:'users')->onDelete(action:'cascade');
            $table->foreignId(column:'category_id')->constrained(table:'categories')->onDelete(action:'cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table:'post');
    }
};
