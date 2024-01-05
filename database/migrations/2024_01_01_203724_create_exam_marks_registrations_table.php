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
            $table->string('subject_id');
            $table->string('class_id');
            $table->string('exam_id');
            $table->string('class_work');
            $table->string('home_work');
            $table->string('exam');            
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
