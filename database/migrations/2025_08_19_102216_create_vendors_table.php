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
        Schema::create('vendors', function (Blueprint $table) {
             
            $table->id();
            $table->string('banner'); 
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->text('description');
            $table->string('fb_link', 2048)->nullable();
            $table->string('tw_link', 2048)->nullable();
            $table->string('insta_link', 2048)->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
