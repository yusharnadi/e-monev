<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (!Auth::user()->can('read kinerja pdam')) abort(403);

        $kinerja = $this->kinerjaService->getAll();

        return view('kinerja.index', ['kinerjas' => $kinerja]);
    }

    public function showPeriod(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
        $period = array('Tahunan', 'Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV');
        return view('kinerja.period', ['period' => $period]);
    }

    public function storePeriod(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
        $period_data = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
        ];

        session(['period_data' => $period_data]);

        return redirect()->route('kinerja.show.finance')->with('message', 'Berhasil menyimpan data.');
    }

    public function showFinace(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
        return view('kinerja.finance');
    }

    public function storeFinace(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
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
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
        return view('kinerja.service');
    }

    public function storeService(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
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
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
        return view('kinerja.production');
    }

    public function storeProduction(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
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
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
        return view('kinerja.resource');
    }

    public function storeResource(Request $request)
    {
        if (!Auth::user()->can('create kinerja pdam')) abort(403);
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
        if (!Auth::user()->can('create kinerja pdam')) abort(403);

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
        if (!Auth::user()->can('create kinerja pdam')) abort(403);

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
        if (!Auth::user()->can('read kinerja pdam')) abort(403);
        $kinerja = $this->kinerjaService->getById($id);
        return view('kinerja.detail', ['kinerja' => $kinerja]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->can('update kinerja pdam')) abort(403);
        $kinerja = $this->kinerjaService->getById($id);
        $period = array('Tahunan', 'Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV');
        return view('kinerja.edit', ['kinerja' => $kinerja, 'period' => $period]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->can('update kinerja pdam')) abort(403);

        if ($this->kinerjaService->update($id, $request->except(['_token']))) {
            return redirect()->route('kinerja.index')->with('message', 'Berhasil menyimpan data.');
        }
        return redirect()->route('kinerja.index')->with('error', 'Gagal menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->can('delete kinerja pdam')) abort(403);

        if ($this->kinerjaService->delete($id)) {
            return redirect()->route('kinerja.index')->with('message', 'Berhasil menghapus data.');
        }
        return redirect()->route('kinerja.index')->with('error', 'Gagal menghapus data.');
    }
}
