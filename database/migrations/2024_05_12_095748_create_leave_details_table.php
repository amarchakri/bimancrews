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
        Schema::create('leave_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('employee_no')->nullable();
            $table->string('leave_type')->nullable();
            $table->string('leave_from')->nullable();
            $table->string('leave_to')->nullable();
            $table->string('reason')->nullable();
            $table->string('leave_address')->nullable();
            $table->integer('leave_total_applied')->nullable();
            $table->integer('total_available')->nullable();
            $table->integer('rest')->nullable();
            $table->integer('leave_status')->nullable();
            $table->integer('leave_incharge_status')->nullable();
            $table->integer('leave_approval_status')->nullable();
            $table->integer('leave_incharge_auth')->nullable();
            $table->integer('leave_admin_auth')->nullable();
            $table->integer('leave_approve_auth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_details');
    }
};
