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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('idProduct',20)->unique();
            $table->string('nameProduct',255);
            $table->string('brand',50);
            $table->string('imgProduct',255);
            $table->unsignedBigInteger('priceProduct');
            $table->unsignedSmallInteger('quantityProduct');
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
