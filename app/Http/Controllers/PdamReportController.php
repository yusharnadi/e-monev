<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdamReportStoreRequest;
use App\Http\Requests\PdamReportUpdateRequest;
use App\Http\Services\PdamReportServiceInterface;
use Illuminate\Support\Facades\Auth;

class PdamReportController extends Controller
{
    public function __construct(private PdamReportServiceInterface $pdamReportService)
    {
    }

    public function index()
    {
        if (!Auth::user()->can('read laporan pdam')) abort(403);

        $reports = $this->pdamReportService->getAll();
        return view('pdam_report.index', ['reports' => $reports]);
    }

    public function create()
    {
        if (!Auth::user()->can('create laporan pdam')) abort(403);

        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('pdam_report.create', ['bulan' => $bulan]);
    }

    public function store(PdamReportStoreRequest $request)
    {
        if (!Auth::user()->can('create laporan pdam')) abort(403);

        $validated_request = $request->safe()->except(['_token']);

        if ($this->pdamReportService->create($validated_request)) {
            return redirect()->route('pdam-report.index')->with('message', 'Berhasil menambahkan data.');
        }
        return redirect()->route('pdam-report.index')->with('error', 'Gagal menambahkan data.');
    }

    public function edit($id)
    {
        if (!Auth::user()->can('update laporan pdam')) abort(403);
        $report = $this->pdamReportService->getById($id);
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return view('pdam_report.edit', ['report' => $report, 'bulan' => $bulan]);
    }

    public function update(PdamReportUpdateRequest $request, $id)
    {
        if (!Auth::user()->can('update laporan pdam')) abort(403);
        $validated_request = $request->safe()->except(['_token']);

        if ($this->pdamReportService->update($id, $validated_request)) {
            return redirect()->route('pdam-report.index')->with('message', 'Berhasil mengubah data.');
        }
        return redirect()->route('pdam-report.index')->with('error', 'Gagal mengubah data.');
    }
}
