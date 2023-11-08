<?php

namespace App\Http\Controllers;

use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Http\Request;

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
        // $kinerja = $this->kinerjaService->getAll();
        $kinerja = [
            ['id' => 1, 'tahun' => 2022, 'periode' => 'Tahunan'],
            ['id' => 2, 'tahun' => 2021, 'periode' => 'Tahunan'],
            ['id' => 3, 'tahun' => 2021, 'periode' => 'Triwulan I'],
            ['id' => 3, 'tahun' => 2021, 'periode' => 'Triwulan II'],
            ['id' => 3, 'tahun' => 2021, 'periode' => 'Triwulan III'],
        ];
        return view('kinerja.index', ['kinerjas' => $kinerja]);
    }

    public function showPeriod(Request $request)
    {
        $period = array('Tahunan', 'Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV');
        return view('kinerja.period', ['period' => $period]);
    }

    public function storePeriod(Request $request)
    {

        $period_data = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
        ];

        session(['period_data' => $period_data]);

        return redirect()->route('kinerja.show.period')->with('message', 'Berhasil menyimpan data.');
    }

    public function showFinace(Request $request)
    {
        // dd($request);
        return view('kinerja.finance');
    }
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
