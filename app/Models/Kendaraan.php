<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'no_plat_kendaraan',
        'jenis_kendaraan',
        'no_stnk',
        'tahun_pembuatan',
        'nama_pemilik',
        'warna_kendaraan',
    ];
}
