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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('jenis_kelamin', ['L', 'P']); // L untuk laki-laki, P untuk perempuan
            $table->string('agama');
            $table->string('nik')->unique();
            $table->string('nisn')->unique(); // Nomor Induk Siswa Nasional
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nohp_siswa')->nullable();
            $table->string('email_siswa',)->nullable();
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->text('alamat');
            $table->string('asal_sekolah')->nullable(); // Bisa nullable jika data opsional
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade')->onUpdate('cascade'); // Mengasumsikan ada tabel rombel
            $table->foreignId('wali_id')->constrained('wali_siswa')->onDelete('cascade')->onUpdate('cascade'); // Mengasumsikan ada tabel wali
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
