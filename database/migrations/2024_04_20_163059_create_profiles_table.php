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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('nkk');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jk', 15);
            $table->string('agama', 25);
            $table->string('no_hp', 15);
            $table->string('no_hp2', 15)->nullable();
            $table->string('alamat');
            $table->string('desa', 100);
            $table->string('kecamatan', 100);
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('pend_terakhir');
            $table->string('no_ijazah', 20);
            $table->year('tahun_lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
