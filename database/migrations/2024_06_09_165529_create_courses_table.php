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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('course_type_id');
            $table->string('course_name_short');
            $table->string('course_name_long')->nullable();
            $table->string('description')->nullable();
            $table->integer('duration_number')->nullable();
            $table->tinyText('duration_in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
