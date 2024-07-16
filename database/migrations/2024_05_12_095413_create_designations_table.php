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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('short_designation')->nullable(); //Casual used everywhere
            $table->string('long_designation')->nullable();   //Original designation name
            $table->string('pseudo_designation')->nullable(); //Alternate / Postingwise designation
            $table->string('duty_bound')->nullable();   // Specialised depend on work 
            $table->string('payGroup')->nullable();   // Specialised depend on work 
            $table->string('department')->nullable();   // Specialised depend on work 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
