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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name_class');
            $table->string('description');
            $table->unsignedBigInteger('trainer_id'); // Relasi ke tabel users
            $table->date('start_time');
            $table->date('end_time');
            $table->integer('capacity');
            $table->timestamps();

            $table->foreign('trainer_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');

    }
};
