<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name'); // Company Name
            $table->string('contact_person'); // Contact Person
            $table->string('phone'); // Phone Number
            $table->text('address'); // Business Address
            $table->string('website')->nullable(); // Website (optional)
            $table->string('business_type'); // Business Type
            $table->text('description'); // Business Description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smes');
    }
};
