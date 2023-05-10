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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('duration');
            $table->string('start_date');
            $table->string('days');
            $table->string('time');
            $table->integer('avaliable_students');
            $table->string('fee');
            $table->boolean('class_type')->default(0);
            $table->unsignedBigInteger('online_info_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('online_info_id')->references('id')->on('online_infos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
