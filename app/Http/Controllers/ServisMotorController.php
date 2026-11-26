<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\PembayaranService;

class ServisMotorController extends Controller
{
    // ==========================================
    // 1. DATA PELANGGAN
    // ==========================================

    public function halamanPelanggan()
    {
        $pelanggan = Pelanggan::all();

        return view('pelanggan', compact('pelanggan'));
    }

    public function indexPelanggan()
    {
        return response()->json(Pelanggan::all());
    }

    public function storePelanggan(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    // EDIT PELANGGAN - MENGGUNAKAN VIEW YANG SAMA
    public function editPelanggan($id_pelanggan)
    {
        $pelanggan = Pelanggan::all();

        $dataEdit = Pelanggan::findOrFail($id_pelanggan);

        return view('pelanggan', compact(
            'pelanggan',
            'dataEdit'
        ));
    }

    public function updatePelanggan(Request $request, $id_pelanggan)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->update($data);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function hapusPelanggan($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);

        $memilikiServis = DaftarService::where(
            'id_pelanggan',
            $id_pelanggan
        )->exists();

        if ($memilikiServis) {
            return redirect()->route('pelanggan.index')
                ->with('error', 'Pelanggan tidak dapat dihapus karena sudah memiliki riwayat servis!');
        }

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus!');
    }


    // ==========================================
    // 2. DATA KENDARAAN
    // ==========================================

    public function halamanKendaraan()
    {
        $kendaraan = Kendaraan::all();

        return view('kendaraan', compact('kendaraan'));
    }

    public function indexKendaraan()
    {
        return response()->json(Kendaraan::all());
    }

    public function storeKendaraanWebsite(Request $request)
    {
        $data = $request->validate([
            'no_plat_kendaraan' => 'required|string|max:255|unique:kendaraans,no_plat_kendaraan',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
        ]);

        Kendaraan::create($data);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    public function storeKendaraan(Request $request)
    {
        $data = $request->validate([
            'no_plat_kendaraan' => 'required|string|max:255|unique:kendaraans,no_plat_kendaraan',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
        ]);

        $kendaraan = Kendaraan::create($data);

        return response()->json([
            'message' => 'Data kendaraan berhasil disimpan',
            'data' => $kendaraan
        ], 201);
    }

    // EDIT KENDARAAN - MENGGUNAKAN VIEW YANG SAMA
    public function editKendaraan($id)
    {
        $kendaraan = Kendaraan::all();

        $dataEditKendaraan = Kendaraan::findOrFail($id);

        return view('kendaraan', compact(
            'kendaraan',
            'dataEditKendaraan'
        ));
    }

    public function updateKendaraan(Request $request, $id)
    {
        $data = $request->validate([
            'no_plat_kendaraan' => 'required|string|max:255|unique:kendaraans,no_plat_kendaraan,' . $id . ',id',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($data);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    public function hapusKendaraan($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $memilikiServis = DaftarService::where(
            'no_plat_kendaraan',
            $kendaraan->no_plat_kendaraan
        )->exists();

        if ($memilikiServis) {
            return redirect()->route('kendaraan.index')
                ->with('error', 'Kendaraan tidak dapat dihapus karena sudah terdaftar dalam servis!');
        }

        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }


    // ==========================================
    // 3. DAFTAR SERVICE
    // ==========================================

    public function halamanDaftarService()
    {
        $data = DaftarService::with('pelanggan')
            ->orderBy('id_servis_pelanggan', 'desc')
            ->get();

        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();

        return view('daftar-service', compact(
            'data',
            'pelanggan',
            'kendaraan'
        ));
    }

    public function indexDaftarService()
    {
        $data = DaftarService::with('pelanggan')->get();

        return response()->json($data);
    }

    public function storeDaftarServiceWebsite(Request $request)
    {
        $data = $request->validate([
            'no_plat_kendaraan' => 'required|exists:kendaraans,no_plat_kendaraan',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        DaftarService::create($data);

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar servis berhasil ditambahkan!');
    }

    public function storeDaftarService(Request $request)
    {
        $data = $request->validate([
            'no_plat_kendaraan' => 'required|exists:kendaraans,no_plat_kendaraan',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $daftar = DaftarService::create($data);

        return response()->json([
            'message' => 'Pendaftaran service berhasil',
            'data' => $daftar
        ], 201);
    }

    // EDIT DAFTAR SERVICE - MENGGUNAKAN VIEW YANG SAMA
    public function editDaftarService($id)
    {
        $data = DaftarService::with('pelanggan')
            ->orderBy('id_servis_pelanggan', 'desc')
            ->get();

        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();

        $dataEditDaftarService = DaftarService::findOrFail($id);

        return view('daftar-service', compact(
            'data',
            'pelanggan',
            'kendaraan',
            'dataEditDaftarService'
        ));
    }

    public function updateDaftarService(Request $request, $id)
    {
        $data = $request->validate([
            'no_plat_kendaraan' => 'required|exists:kendaraans,no_plat_kendaraan',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $daftar = DaftarService::findOrFail($id);

        $sudahMemilikiDataService = DataService::where(
            'id_servis_pelanggan',
            $daftar->id_servis_pelanggan
        )->exists();

        if ($sudahMemilikiDataService) {
            DataService::where(
                'id_servis_pelanggan',
                $daftar->id_servis_pelanggan
            )->update([
                'keluhan_kendaraan' => $data['keluhan_kendaraan']
            ]);
        }

        $daftar->update($data);

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar servis berhasil diperbarui!');
    }

    public function hapusDaftarService($id)
    {
        $daftar = DaftarService::findOrFail($id);

        $memilikiDataService = DataService::where(
            'id_servis_pelanggan',
            $daftar->id_servis_pelanggan
        )->exists();

        if ($memilikiDataService) {
            return redirect()->route('daftar-service.index')
                ->with('error', 'Daftar servis tidak dapat dihapus karena sudah memiliki riwayat servis!');
        }

        $daftar->delete();

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar servis berhasil dihapus!');
    }


    // ==========================================
    // 4. DATA SERVICE
    // ==========================================

    public function indexDataService(Request $request)
    {
        $data = DataService::orderBy('id', 'desc')->get();

        if ($request->is('api/*') || $request->expectsJson()) {
            return response()->json($data);
        }

        $daftar = DaftarService::orderBy(
            'id_servis_pelanggan',
            'desc'
        )->get();

        return view('data-service', compact(
            'data',
            'daftar'
        ));
    }

    public function storeDataService(Request $request)
    {
        $validasi = $request->validate([
            'id_servis_pelanggan' => 'required|exists:daftar_services,id_servis_pelanggan',
            'estimasi_service' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'required|string|max:255',
        ]);

        $daftar = DaftarService::findOrFail(
            $validasi['id_servis_pelanggan']
        );

        $data = DataService::create([
            'id_servis_pelanggan' => $daftar->id_servis_pelanggan,
            'keluhan_kendaraan' => $daftar->keluhan_kendaraan,
            'estimasi_service' => $validasi['estimasi_service'],
            'nama_mekanik' => $validasi['nama_mekanik'],
            'sparepart_pengganti' => $validasi['sparepart_pengganti'],
        ]);

        if ($request->is('api/*') || $request->expectsJson()) {
            return response()->json([
                'message' => 'Data service berhasil disimpan',
                'data' => $data
            ], 201);
        }

        return redirect()->route('data-service.index')
            ->with('success', 'Riwayat servis berhasil disimpan!');
    }

    // EDIT DATA SERVICE - MENGGUNAKAN VIEW YANG SAMA
    public function editDataService($id)
    {
        $data = DataService::orderBy('id', 'desc')->get();

        $daftar = DaftarService::orderBy(
            'id_servis_pelanggan',
            'desc'
        )->get();

        $dataEditService = DataService::findOrFail($id);

        return view('data-service', compact(
            'data',
            'daftar',
            'dataEditService'
        ));
    }

    public function updateDataService(Request $request, $id)
    {
        $validasi = $request->validate([
            'estimasi_service' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'required|string|max:255',
        ]);

        $data = DataService::findOrFail($id);
        $data->update($validasi);

        return redirect()->route('data-service.index')
            ->with('success', 'Riwayat servis berhasil diperbarui!');
    }

    public function hapusDataService($id)
    {
        $data = DataService::findOrFail($id);

        $sudahDibayar = PembayaranService::where(
            'id_servis_pelanggan',
            $data->id_servis_pelanggan
        )->exists();

        if ($sudahDibayar) {
            return redirect()->route('data-service.index')
                ->with('error', 'Riwayat servis tidak dapat dihapus karena sudah memiliki data pembayaran!');
        }

        $data->delete();

        return redirect()->route('data-service.index')
            ->with('success', 'Riwayat servis berhasil dihapus!');
    }


    // ==========================================
    // 5. PEMBAYARAN SERVICE
    // ==========================================

    public function indexPembayaran(Request $request)
    {
        $data = PembayaranService::orderBy('id', 'desc')->get();

        if ($request->is('api/*') || $request->expectsJson()) {
            return response()->json($data);
        }

        $dataService = DataService::select('id_servis_pelanggan')
            ->distinct()
            ->orderBy('id_servis_pelanggan', 'desc')
            ->get();

        return view('pembayaran', compact(
            'data',
            'dataService'
        ));
    }

    public function storePembayaran(Request $request)
    {
        $validasi = $request->validate([
            'id_servis_pelanggan' => 'required|exists:data_services,id_servis_pelanggan',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $data = PembayaranService::create($validasi);

        if ($request->is('api/*') || $request->expectsJson()) {
            return response()->json([
                'message' => 'Pembayaran berhasil disimpan',
                'data' => $data
            ], 201);
        }

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil disimpan!');
    }

    // EDIT PEMBAYARAN - MENGGUNAKAN VIEW YANG SAMA
    public function editPembayaran($id)
    {
        $data = PembayaranService::orderBy('id', 'desc')->get();

        $dataService = DataService::select('id_servis_pelanggan')
            ->distinct()
            ->orderBy('id_servis_pelanggan', 'desc')
            ->get();

        $dataEditPembayaran = PembayaranService::findOrFail($id);

        return view('pembayaran', compact(
            'data',
            'dataService',
            'dataEditPembayaran'
        ));
    }

    public function updatePembayaran(Request $request, $id)
    {
        $validasi = $request->validate([
            'id_servis_pelanggan' => 'required|exists:data_services,id_servis_pelanggan',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $data = PembayaranService::findOrFail($id);
        $data->update($validasi);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui!');
    }

    public function hapusPembayaran($id)
    {
        $data = PembayaranService::findOrFail($id);

        $data->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus!');
    }
}
