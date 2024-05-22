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
        Schema::create('motorcycle', function (Blueprint $table) {
            $table->id();
            $table->string('plat_number')->unique();
            $table->string('name');
            $table->string('brand');
            $table->string('category');
            $table->integer('cc');
            $table->integer('year');
            $table->string('location');

            $table->string('image');
            $table->integer('fee');
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycle');
    }
};
