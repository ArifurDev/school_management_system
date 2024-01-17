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
        Schema::create('exam_marks_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('subject_id');
            $table->string('class_id');
            $table->string('exam_id');
            $table->string('class_work')->nullable()->default(0);
            $table->string('home_work')->nullable()->default(0);
            $table->string('mark')->nullable()->default(0);
            $table->string('attendance_mark')->nullable()->default(0);
            $table->string('total_mark')->nullable()->default(0);
            $table->string('full_marks')->nullable()->default(0);
            $table->string('pass_marks')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_marks_registrations');
    }
};
