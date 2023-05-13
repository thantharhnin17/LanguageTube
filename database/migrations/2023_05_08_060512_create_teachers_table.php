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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recruit_id')->nullable();
            $table->boolean('type')->default(0);
            $table->boolean('time')->default(0);
            $table->string('education')->nullable();
            $table->string('university')->nullable();
            $table->string('cv_form')->nullable();
            $table->longtext('comment')->nullable();
            $table->string('status')->default('Pending')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('recruit_id')->references('id')->on('recruits')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
