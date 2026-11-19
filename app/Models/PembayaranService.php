<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranService extends Model
{
    protected $table = 'pembayaran_services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_servis_pelanggan',
        'jumlah_biaya_servis',
        'jenis_pembayaran',
        'keterangan',
    ];
}
