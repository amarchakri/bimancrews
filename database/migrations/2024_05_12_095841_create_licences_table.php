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
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('licence_name_short')->nullable();
            $table->string('licence_name_long')->nullable();
            $table->string('level')->nullable();//only for english proficiency
            $table->integer('duration_number')->nullable();
            $table->string('duration_in')->nullable();//Month(M), Year(Y)..
            $table->string('institute')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};
