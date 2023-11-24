<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use App\Http\Services\PdamReportServiceInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private KinerjaServiceInterface $kinerjaService, private PdamReportServiceInterface $pdamReportService)
    {
    }
    public function index()
    {
        $kinerja = $this->kinerjaService->getLatestYear();
        // dd($kinerja);
        $penilaian = calculateBpspam($kinerja);
        // dd($penilaian);
        $reports = $this->pdamReportService->getLimit(3);
        // dd($report);
        return view('dashboard', ['penilaian' => $penilaian, 'kinerja' => $kinerja, 'reports' => $reports]);
    }
}
