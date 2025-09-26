<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banquets', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('person');
            $table->integer('priority')->default(0)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('banquets', function (Blueprint $table) {
            $table->dropColumn(['status', 'priority']);
        });
    }
};
