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
        Schema::create('wali_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah');
            $table->integer('nohp_ayah')->unsigned()->nullable();
            $table->string('email_ayah')->nullable();
            $table->string('pekerjaan_ayah');

            $table->string('nama_ibu');
            $table->integer('nohp_ibu')->unsigned()->nullable();
            $table->string('email_ibu')->nullable();
            $table->string('pekerjaan_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_siswa');
    }
};
