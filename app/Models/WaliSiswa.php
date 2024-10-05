<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSiswa extends Model
{
    use HasFactory;
    protected $table = 'wali_siswa';
    protected $fillable = [
        'nama_ayah',
        'nohp_ayah',
        'email_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'nohp_ibu',
        'email_ibu',
        'pekerjaan_ibu',
    ];
}
