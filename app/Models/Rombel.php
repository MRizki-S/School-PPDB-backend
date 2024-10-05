<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rombel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rombel';
    protected $fillable = [
        "name",
        "jurusan_id",
        "kelas_id",
    ];

    // relasi one to many
    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    // one to many
    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

}
