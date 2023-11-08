<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdamReportStoreRequest;
use App\Http\Services\PdamReportServiceInterface;
use Illuminate\Support\Facades\Log;

class PdamReportController extends Controller
{
    public function __construct(private PdamReportServiceInterface $pdamReportService)
    {
    }

    public function index()
    {
        $reports = $this->pdamReportService->getAll();
        return view('pdam_report.index', ['reports' => $reports]);
    }

    public function create()
    {
        $bulan = ['Januari', 'Februari'];
        return view('pdam_report.create', ['bulan' => $bulan]);
    }

    public function store(PdamReportStoreRequest $request)
    {

        $validated_request = $request->safe()->except(['_token']);

        if ($this->pdamReportService->create($validated_request)) {
            return redirect()->route('pdam-report.index')->with('message', 'Berhasil menambahkan data.');
        }
        return redirect()->route('pdam-report.index')->with('error', 'Gagal menambahkan data.');
    }
}
