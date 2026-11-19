<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_servis_pelanggan');
            $table->text('keluhan_kendaraan');
            $table->string('estimasi_service');
            $table->string('nama_mekanik');
            $table->string('sparepart_pengganti');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_services');
    }
};