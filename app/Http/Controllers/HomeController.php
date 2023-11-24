<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private KinerjaServiceInterface $kinerjaService)
    {
    }
    public function index()
    {
        $kinerja = $this->kinerjaService->getLatestYear();
        // dd($kinerja);
        $penilaian = calculateBpspam($kinerja);

        return view('home', ['penilaian' => $penilaian, 'kinerja' => $kinerja]);
    }
}
