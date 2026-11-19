<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $table = 'daftar_services';

    protected $primaryKey = 'id_servis_pelanggan';

    protected $fillable = [
        'no_plat_kendaraan',
        'id_pelanggan',
        'keluhan_kendaraan',
        'tanggal_servis',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }
}
