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
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_maker_id')  -> nullable();
            $table->foreign('job_maker_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name', 100)->nullable()->default('text');
            $table->string('description');
            $table->string('type');
            $table->string('location');
            $table->string('education');
            $table->string('experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
