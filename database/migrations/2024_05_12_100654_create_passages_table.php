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
        Schema::create('passages', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('applicants');//ex: employee only or with family member
            $table->integer('passage_type')->nullable();
            $table->string('visit_permission')->nullable();
            $table->date('permission_date')->nullable();
            $table->integer('leaveForPassage');//leave selection
            $table->string('sector_from1')->nullable();
            $table->string('sector_to1')->nullable();
            $table->string('sector_from2')->nullable();
            $table->string('sector_to2')->nullable();
            $table->text('passage_class')->nullable();
            $table->integer('passage_way')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('discount_depend')->nullable();
            $table->integer('free_baggage')->nullable();
            $table->string('admin_comment')->nullable();
            $table->boolean('admin_verify')->nullable();
            $table->date('admin_date')->nullable();
            $table->boolean('approver')->nullable();
            $table->date('approver_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passages');
    }
};
