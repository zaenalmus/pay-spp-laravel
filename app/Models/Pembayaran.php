<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id',
        'nisn',
        'bulan_dibayar',
        'id_spp',
        'jumlah_bayar',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
