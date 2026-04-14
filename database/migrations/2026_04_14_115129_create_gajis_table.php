<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();

            // relasi ke karyawan (WAJIB)
            $table->foreignId('karyawan_id')
                  ->constrained('karyawans')
                  ->onDelete('cascade');

            // kolom gaji
            $table->integer('gaji');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};