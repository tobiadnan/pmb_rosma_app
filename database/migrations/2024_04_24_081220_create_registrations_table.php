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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('kode_prodi');
            $table->foreign('kode_prodi')->references('kode_prodi')->on('prodies')->onDelete('cascade');
            $table->string('tahun_akademik');
            $table->string('jalur');
            $table->string('kk'); // Kolom untuk gambar scan KK
            $table->string('ktp')->nullable(); // Kolom untuk gambar scan KTP
            $table->string('ijazah'); // Kolom untuk gambar scan ijazah
            $table->string('transkip'); // Kolom untuk gambar scan transkip nilai
            $table->string('bukti_tf'); // Kolom untuk gambar scan bukti transfer biaya registrasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
