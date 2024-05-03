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
            $table->unsignedBigInteger('appendix_id')->nullable();
            $table->foreign('appendix_id')->references('id')->on('appendixes')->onDelete('cascade');
            $table->string('tahun_akademik');
            $table->string('jalur');
            $table->decimal('reg_fee', 10, 2);
            $table->dateTime('tgl_registration')->nullable();
            $table->boolean('is_verif')->default(false);
            $table->boolean('is_set')->default(false);
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
