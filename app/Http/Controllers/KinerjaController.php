<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KinerjaController extends Controller
{

    public function __construct(private KinerjaServiceInterface $kinerjaService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kinerja = $this->kinerjaService->getAll();
        $data = '[
            {
            "laba_bersih": 1959565707,
            "equity": 87694705743,
            "biaya_operasi": 53280719526,
            "pendapatan_operasi": 55018285233,
            "kas": 55018285233,
            "utang_lancar": 614005000,
            "penerimaan_rek_air": 39468699038,
            "rek_air": 44738998733,
            "aktiva": 88308710743,
            "utang": 614005000,
            "penduduk_terlayani": 89645,
            "penduduk_dalam_wilayah_Kerja_pdam": 202660,
            "pelanggan_bulan_lalu": 19891,
            "pelanggan_bulan_ini": 23797,
            "keluhan_selesai": 160,
            "keluhan": 160,
            "uji_kualitas_memenuhi_syarat": 0,
            "jumlah_uji": 0,
            "air_terjual_domestik": 285130,
            "pelanggan_domestik": 20179,
            "volume_produksi_rill": 7161823,
            "kapasitas_produksi_terpasang": 10722240,
            "volume_distribusi_air": 7161823,
            "air_terjual": 5260359,
            "waktu_distribusi": 620,
            "pelanggan_tekanan_7": 6083,
            "jumlah_pelanggan": 23797,
            "jumlah_meter_air_diganti": 780,
            "jumlah_pegawai": 59,
            "jumlah_pegawai_diklat": 55,
            "biaya_diklat": 800000000,
            "jumlah_biaya_pegawai": 20786565250,
            "tahun": "2022",
            "periode": "Tahunan"
            },
            {
            "laba_bersih": 1959565707,
            "equity": 87694705743,
            "biaya_operasi": 53280719526,
            "pendapatan_operasi": 55018285233,
            "kas": 55018285233,
            "utang_lancar": 614005000,
            "penerimaan_rek_air": 39468699038,
            "rek_air": 44738998733,
            "aktiva": 88308710743,
            "utang": 614005000,
            "penduduk_terlayani": 89645,
            "penduduk_dalam_wilayah_Kerja_pdam": 202660,
            "pelanggan_bulan_lalu": 19891,
            "pelanggan_bulan_ini": 23797,
            "keluhan_selesai": 160,
            "keluhan": 160,
            "uji_kualitas_memenuhi_syarat": 0,
            "jumlah_uji": 0,
            "air_terjual_domestik": 285130,
            "pelanggan_domestik": 20179,
            "volume_produksi_rill": 7161823,
            "kapasitas_produksi_terpasang": 10722240,
            "volume_distribusi_air": 7161823,
            "air_terjual": 5260359,
            "waktu_distribusi": 620,
            "pelanggan_tekanan_7": 6083,
            "jumlah_pelanggan": 23797,
            "jumlah_meter_air_diganti": 780,
            "jumlah_pegawai": 59,
            "jumlah_pegawai_diklat": 55,
            "biaya_diklat": 800000000,
            "jumlah_biaya_pegawai": 20786565250,
            "tahun": "2022",
            "periode": "Triwulan I"
            }
            ]';
        // return response()->json(json_decode($data));
        return view('kinerja.index', ['kinerjas' => $kinerja]);
    }

    public function showPeriod(Request $request)
    {
        $period = array('Tahunan', 'Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV');
        return view('kinerja.period', ['period' => $period]);
    }

    public function storePeriod(Request $request)
    {

        $period_data = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
        ];

        session(['period_data' => $period_data]);

        return redirect()->route('kinerja.show.finance')->with('message', 'Berhasil menyimpan data.');
    }

    public function showFinace(Request $request)
    {
        return view('kinerja.finance');
    }

    public function storeFinace(Request $request)
    {
        $finance_data = [
            'laba_bersih' => $request->laba_bersih,
            'utang_lancar' => $request->utang_lancar,
            'equity' => $request->equity,
            'penerimaan_rek_air' => $request->penerimaan_rek_air,
            'biaya_operasi' => $request->biaya_operasi,
            'rek_air' => $request->rek_air,
            'pendapatan_operasi' => $request->pendapatan_operasi,
            'aktiva' => $request->aktiva,
            'kas' => $request->kas,
            'utang' => $request->utang,
        ];

        session(['finance_data' => $finance_data]);

        return redirect()->route('kinerja.show.service')->with('message', 'Berhasil menyimpan data.');
    }

    public function showService(Request $request)
    {
        return view('kinerja.service');
    }

    public function storeService(Request $request)
    {
        $service_data = [
            'penduduk_terlayani' => $request->penduduk_terlayani,
            'penduduk_dalam_wilayah_Kerja_pdam' => $request->penduduk_dalam_wilayah_Kerja_pdam,
            'pelanggan_bulan_lalu' => $request->pelanggan_bulan_lalu,
            'pelanggan_bulan_ini' => $request->pelanggan_bulan_ini,
            'keluhan_selesai' => $request->keluhan_selesai,
            'keluhan' => $request->keluhan,
            'uji_kualitas_memenuhi_syarat' => $request->uji_kualitas_memenuhi_syarat,
            'jumlah_uji' => $request->jumlah_uji,
            'air_terjual_domestik' => $request->air_terjual_domestik,
            'pelanggan_domestik' => $request->pelanggan_domestik,
        ];

        session(['service_data' => $service_data]);

        return redirect()->route('kinerja.show.production')->with('message', 'Berhasil menyimpan data.');
    }

    public function showProduction(Request $request)
    {
        return view('kinerja.production');
    }

    public function storeProduction(Request $request)
    {
        $production_data = [
            'volume_produksi_rill' => $request->volume_produksi_rill,
            'kapasitas_produksi_terpasang' => $request->kapasitas_produksi_terpasang,
            'volume_distribusi_air' => $request->volume_distribusi_air,
            'air_terjual' => $request->air_terjual,
            'waktu_distribusi' => $request->waktu_distribusi,
            'pelanggan_tekanan_7' => $request->pelanggan_tekanan_7,
            'jumlah_pelanggan' => $request->jumlah_pelanggan,
            'jumlah_meter_air_diganti' => $request->jumlah_meter_air_diganti,
        ];

        session(['production_data' => $production_data]);

        return redirect()->route('kinerja.show.resource')->with('message', 'Berhasil menyimpan data.');
    }

    public function showResource(Request $request)
    {
        return view('kinerja.resource');
    }

    public function storeResource(Request $request)
    {
        $resource_data = [
            'jumlah_pegawai' => $request->jumlah_pegawai,
            'jumlah_pegawai_diklat' => $request->jumlah_pegawai_diklat,
            'biaya_diklat' => $request->biaya_diklat,
            'jumlah_biaya_pegawai' => $request->jumlah_biaya_pegawai,
        ];

        $request->session()->put('resource_data', $resource_data);

        return redirect()->route('kinerja.show.resource')->with('message', 'Berhasil menyimpan data.');
    }

    public function create(Request $request)
    {
        $period_data = $request->session()->get('period_data');
        $finance_data = $request->session()->get('finance_data');
        $service_data = $request->session()->get('service_data');
        $production_data = $request->session()->get('production_data');
        $resource_data = $request->session()->get('resource_data');
        return view('kinerja.create', ['period_data' => $period_data, 'finance_data' => $finance_data, 'service_data' => $service_data, 'production_data' => $production_data, 'resource_data' => $resource_data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($this->kinerjaService->create($request->except(['_token']))) {
            return redirect()->route('kinerja.index')->with('message', 'Berhasil menyimpan data.');
        }
        return redirect()->route('kinerja.index')->with('error', 'Gagal menyimpan data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
