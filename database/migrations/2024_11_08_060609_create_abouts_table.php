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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading');
            $table->longText('description');
            $table->string('image');
            $table->string('year_of_exprience');
            $table->string('year_of_exprience_title'); 
            $table->string('testimonials_word');
            $table->string('testimonials_heading');
            $table->string('testimonials_short_description');
            $table->string('facilties_word');
            $table->string('facilties_heading');
            $table->string('facilties_short_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
