<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private KinerjaServiceInterface $kinerjaService)
    {
    }
    public function index()
    {
        $year = date('Y') - 1;
        $kinerja = $this->kinerjaService->getByYear($year);
        // dd($kinerja);
        $penilaian = calculateBpspam($kinerja);
        // dd($penilaian);
        return view('dashboard', ['tahun' => $year, 'penilaian' => $penilaian, 'kinerja' => $kinerja]);
    }
}
