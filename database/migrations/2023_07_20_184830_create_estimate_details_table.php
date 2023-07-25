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
        Schema::create('estimate_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estimate_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer("unitprice");
            $table->integer("amount");
            $table->integer("quantity");
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('estimate_id')->references('id')->on('estimates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_details');
    }
};
