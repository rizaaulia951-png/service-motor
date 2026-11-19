<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_services', function (Blueprint $table) {
            $table->id('id_servis_pelanggan');
            $table->string('no_plat_kendaraan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->text('keluhan_kendaraan');
            $table->date('tanggal_servis');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_services');
    }
};