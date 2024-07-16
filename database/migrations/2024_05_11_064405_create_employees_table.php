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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('pseudoDesignation')->nullable();
            $table->integer('dutyBoundDesignation')->nullable();
            $table->string('employee_type')->nullable();//ex-Contractual, Permanent
            $table->string('number_type')->nullable(); //ex-P,G,C
            $table->integer('employee_no')->nullable();//505050,36668
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('roster_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('signature')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->integer('shop')->nullable();
            $table->integer('is_cockpit_crew')->nullable();
            $table->integer('is_admin_cell')->nullable();
            $table->integer('incharge_id')->nullable();
            $table->integer('approver_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
