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
        Schema::create('proficiencies', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('auth_employee_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('course_authority_id')->nullable();
            $table->string('institute')->nullable();
            $table->string('executor')->nullable();
            $table->string('aircraft')->nullable();
            $table->string('reference')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('validupto')->nullable();
            $table->string('certificate_image')->nullable();
            $table->string('transcript_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proficiencies');
    }
};
