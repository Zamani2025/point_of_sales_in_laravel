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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default('OpenGate Travel & Tours');
            $table->string("address")->default("Stadium");
            $table->string("phone")->default("+233 552 732025");
            $table->string("email")->default("iddishan1!@gmail.com");
            $table->string("fax")->default("+2290 45585858");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
