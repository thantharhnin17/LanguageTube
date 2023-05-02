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
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('title');
            $table->string('recruit_img');
            $table->boolean('type')->default(0);
            $table->string('salary');
            $table->string('worktime');
            $table->string('workdays');
            $table->longtext('description');
            $table->longtext('requirement');
            $table->integer('total_person');
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_posts');
    }
};
