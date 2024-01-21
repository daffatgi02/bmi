<?php

namespace App\Http\Controllers;

use App\Charts\GrafikdashboardChart;
use App\Models\Danak;
use App\Models\Dantrian;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use Illuminate\Http\Request;

class BidanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GrafikdashboardChart $chart)
    {
        $title = "Dashboard";
        $danaks = Danak::all();
        $dbulans = Dbulan::all();
        $dposyandus = Dposyandu::all();
        $dantrians = Dantrian::all();
        return view(
            'bidan.index',
            compact('danaks', 'dposyandus', 'dbulans', 'dantrians', 'title'),
            ['chart' => $chart->build()]
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
