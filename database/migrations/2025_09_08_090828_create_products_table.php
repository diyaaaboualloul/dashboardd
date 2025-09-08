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
    Schema::create('products', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->string('image_path')->nullable(); // will store the uploaded image path
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
