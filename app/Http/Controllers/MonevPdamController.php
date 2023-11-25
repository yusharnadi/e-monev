<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonevPdamController extends Controller
{
    public function __construct(private KinerjaServiceInterface $kinerjaService)
    {
    }

    public function index()
    {
        if (!Auth::user()->can('read monev pdam')) abort(403);

        $kinerjas = $this->kinerjaService->getAll();
        return view('monev.pdam.index', ['kinerjas' => $kinerjas]);
    }

    public function detail(int $id)
    {
        if (!Auth::user()->can('read monev pdam')) abort(403);

        $kinerja = $this->kinerjaService->getById($id);
        // dd($this->kinerjaService->calculateBpspam($kinerja));
        // $penilaian = $this->kinerjaService->calculateBpspam($kinerja);
        $penilaian = calculateBpspam($kinerja);
        return view('monev.pdam.detail', ['kinerja' => $kinerja, 'penilaian' => $penilaian]);
    }

    public function updateCatatanMonitoring(int $id, Request $request)
    {
        if (!Auth::user()->can('update monev pdam')) abort(403);

        if ($this->kinerjaService->update($id, $request->except(['_token']))) {
            return redirect()->route('monev.pdam.detail', $id)->with('message', 'Berhasil menambahkan catatan monitoring.');
        }
        return redirect()->route('monev.pdam.detail', $id)->with('error', 'Gagal menambahkan catatan monitoring.');
    }

    public function exportPdf(int $id)
    {
        if (!Auth::user()->can('read monev pdam')) abort(403);

        $kinerja = $this->kinerjaService->getById($id);
        $penilaian = calculateBpspam($kinerja);
        // return view('monev.pdam.export', ['kinerja' => $kinerja, 'penilaian' => $penilaian]);
        $pdf = Pdf::loadView('monev.pdam.export', ['kinerja' => $kinerja, 'penilaian' => $penilaian])->setPaper('a4', 'legal')->setWarnings(false);
        return $pdf->stream('monev.pdf');
    }
}
