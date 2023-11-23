<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KinerjaPdamController extends Controller
{
    public function __construct(private KinerjaServiceInterface $kinerjaService)
    {
    }

    public function getPeriodeByCurrenyYear()
    {
        try {
            $penilaian_triwulan_1 = 0;
            $penilaian_triwulan_2 = 0;
            $penilaian_triwulan_3 = 0;
            $penilaian_triwulan_4 = 0;

            $year = date('Y') - 1;

            $kinerja_triwulan_1 = $this->kinerjaService->getPeriodYear($year, 'Triwulan I');
            $kinerja_triwulan_2 = $this->kinerjaService->getPeriodYear($year, 'Triwulan II');
            $kinerja_triwulan_3 = $this->kinerjaService->getPeriodYear($year, 'Triwulan III');
            $kinerja_triwulan_4 = $this->kinerjaService->getPeriodYear($year, 'Triwulan IV');

            if ($kinerja_triwulan_1 != null) {
                $penilaian_triwulan_1 = calculateBpspam($kinerja_triwulan_1)['total_bobot'];
            }

            if ($kinerja_triwulan_2 != null) {
                $penilaian_triwulan_2 = calculateBpspam($kinerja_triwulan_2)['total_bobot'];
            }

            if ($kinerja_triwulan_3 != null) {
                $penilaian_triwulan_3 = calculateBpspam($kinerja_triwulan_3)['total_bobot'];
            }

            if ($kinerja_triwulan_4 != null) {
                $penilaian_triwulan_4 = calculateBpspam($kinerja_triwulan_4)['total_bobot'];
            }

            $data['penilaian_triwulan_1'] = $penilaian_triwulan_1;
            $data['penilaian_triwulan_2'] = $penilaian_triwulan_2;
            $data['penilaian_triwulan_3'] = $penilaian_triwulan_3;
            $data['penilaian_triwulan_4'] = $penilaian_triwulan_4;

            return response()->json(['data' => $data]);
        } catch (\Throwable $th) {
            Log::error('Kinerja Api Error', ['error' => $th->getMessage()]);
            return response()->json(['error' => $th->getMessage()]);
        }
    }
}
