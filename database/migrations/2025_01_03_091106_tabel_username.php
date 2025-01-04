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
    Schema::create('user', function (Blueprint $table) { // Ganti 'user' menjadi 'users'
        $table->id();
        $table->string('username');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('no_telepon')->nullable();
        $table->enum('role', ['admin', 'user', 'trainer'])->default('user');
        $table->enum('status', ['active', 'inactive'])->default('inactive');
        $table->rememberToken();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('user'); // Tetap sesuai dengan tabel yang dibuat
}

};
