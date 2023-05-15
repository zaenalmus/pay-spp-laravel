<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'nisn';

    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'no_telp',
        'id_spp'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
