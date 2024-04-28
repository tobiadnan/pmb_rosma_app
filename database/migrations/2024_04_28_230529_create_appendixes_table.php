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
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('transkip')->nullable();
            $table->string('bukti_tf')->nullable();
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
