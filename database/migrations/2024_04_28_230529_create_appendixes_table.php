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
        Schema::create('appendixes', function (Blueprint $table) {
            $table->id();
            $table->string('ktp');
            $table->string('kk');
            $table->string('ijazah');
            $table->string('transkip');
            $table->string('bukti_tf');
            $table->string('raport')->nullable();
            $table->string('kip')->nullable();
            $table->string('yaperos_letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appendixes');
    }
};
