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
        Schema::create('estimate_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estimate_id')->unsigned();
            $table->string("charges");
            $table->integer("user_id");
            $table->date("transac_date");
            $table->integer("transac_amount");
            $table->timestamps();
            $table->foreign('estimate_id')->references('id')->on('estimates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_transactions');
    }
};
