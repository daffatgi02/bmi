<?php

namespace App\Http\Controllers;

use App\Charts\GrafikPerkembanganChart;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use Illuminate\Http\Request;

class GrafikPerkembanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, GrafikPerkembanganChart $chart)
    {
        $title = "Data Grafik Perkembangan";
        $dbulans = Dbulan::all();

        // Ambil posyandu yang dipilih dari dropdown
        $selectedPosyandu = $request->input('posyandu'); // Pastikan ini sesuai dengan nama field pada form

        return view(
            "bidan.grafikperkembangan",
            compact('title', 'dbulans', 'selectedPosyandu'),
            ['chart' => $chart->build($selectedPosyandu)] // Kirim posyandu ke fungsi build chart
        );
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
