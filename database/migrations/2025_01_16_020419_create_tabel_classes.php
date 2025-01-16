<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name_class');
            $table->string('description');
            $table->unsignedBigInteger('trainer_id'); 
            $table->date('start_date')->default(DB::raw('CURRENT_DATE'));
            $table->date('end_date');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('capacity');
            $table->timestamps();

            $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
