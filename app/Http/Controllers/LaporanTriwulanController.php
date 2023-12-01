<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaporanTriwulanStoreRequest;
use App\Http\Requests\LaporanTriwulanUpdateRequest;
use App\Http\Services\LaporanTriwulanServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanTriwulanController extends Controller
{
    public function __construct(private LaporanTriwulanServiceInterface $laporanTriwulanService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('read laporan triwulan pdam')) abort(403);

        $reports = $this->laporanTriwulanService->getAll();

        return view('laporan_triwulan.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('create laporan triwulan pdam')) abort(403);

        $period = array('Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV');

        return view('laporan_triwulan.create', ['period' => $period]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaporanTriwulanStoreRequest $request)
    {
        if (!Auth::user()->can('create laporan triwulan pdam')) abort(403);

        $validated_request = $request->safe()->except(['_token']);

        if ($this->laporanTriwulanService->create($validated_request)) {
            return redirect()->route('laporan-triwulan.index')->with('message', 'Berhasil menambahkan data.');
        }
        return redirect()->route('laporan-triwulan.index')->with('error', 'Gagal menambahkan data.');
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
        if (!Auth::user()->can('update laporan triwulan pdam')) abort(403);

        $report = $this->laporanTriwulanService->getById($id);

        $period = array('Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV');

        return view('laporan_triwulan.edit', ['period' => $period, 'report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaporanTriwulanUpdateRequest $request, string $id)
    {
        if (!Auth::user()->can('update laporan triwulan pdam')) abort(403);
        $validated_request = $request->safe()->except(['_token']);

        if ($this->laporanTriwulanService->update($id, $validated_request)) {
            return redirect()->route('laporan-triwulan.index')->with('message', 'Berhasil mengubah data.');
        }
        return redirect()->route('laporan-triwulan.index')->with('error', 'Gagal mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->can('delete laporan triwulan pdam')) abort(403);

        if ($this->laporanTriwulanService->delete($id)) {
            return redirect()->route('laporan-triwulan.index')->with('message', 'Berhasil menghapus data.');
        }

        return redirect()->route('laporan-triwulan.index')->with('error', 'Gagal menghapus data.');
    }
}
