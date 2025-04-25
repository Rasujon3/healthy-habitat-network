<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->text('health_benefits')->nullable();
            $table->enum('price_category', ['affordable', 'moderate', 'premium']);
            $table->string('product_type');
            $table->decimal('price', 10, 2);
            $table->boolean('is_available')->default(true);
            $table->text('certifications');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
