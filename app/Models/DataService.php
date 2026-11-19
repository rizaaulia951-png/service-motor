<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    protected $table = 'data_services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_servis_pelanggan',
        'keluhan_kendaraan',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti',
    ];
}
