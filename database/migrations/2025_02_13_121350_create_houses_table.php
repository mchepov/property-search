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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->index();
            $table->float('price', 2)->nullable()->index();
            $table->integer('bedrooms')->nullable()->index();
            $table->integer('bathrooms')->nullable()->index();
            $table->integer('storeys')->nullable()->index();
            $table->integer('garages')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
