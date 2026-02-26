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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id')  -> nullable();
            $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('divisi_id')  -> nullable();
            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade');
            $table->string('name', 100)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
