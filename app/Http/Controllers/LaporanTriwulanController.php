<?php

namespace App\Http\Controllers;

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
        //
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
