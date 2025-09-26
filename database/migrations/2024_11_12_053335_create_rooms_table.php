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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('slug');
            $table->string('area');
            $table->string('short_description');
            $table->bigInteger('star');
            $table->decimal('price', 8, 2);
            $table->string('timing');
            $table->text('images');
            $table->string('room_description_heading');
            $table->longText('room_description');
            $table->string('amenites_heading');
            $table->longText('amenites_id');
       
            $table->longText('house_rule');
            
            $table->longText('cancellation_rule');
            $table->boolean('status')->default(0);
            $table->boolean('best_room')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
