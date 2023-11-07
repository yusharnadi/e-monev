<?php

namespace App\Http\Controllers;

use App\Http\Services\PdamReportServiceInterface;
use Illuminate\Http\Request;

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
}
