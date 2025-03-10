<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->boolean('vote_value'); // true = Yes, false = No
            $table->timestamps();

            // Prevent duplicate votes
            $table->unique(['resident_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
};
