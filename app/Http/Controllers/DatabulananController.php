<?php

namespace App\Http\Controllers;

use App\Models\Danak;
use App\Models\Dantrian;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DatabulananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danaks = Danak::all();
        $dbulans = Dbulan::all();
        $dposyandu = Dposyandu::all();
        return view("bidan.databulanan", compact('danaks', 'dbulans', 'dposyandu'));
    }

    public function getData(Request $request)
    {

        $dbulanans = Dbulan::with('danaks');

        if ($request->ajax()) {
            return datatables()->of($dbulanans)
                ->addIndexColumn()
                ->toJson();
        }
    }
    public function getData2(Request $request)
    {

        $dantrians = Dantrian::all();

        if ($request->ajax()) {
            return datatables()->of($dantrians)
                ->addIndexColumn()
                ->addColumn('actions', function ($dantrian) {
                    return view('actions.actionantrian', compact('dantrian'));
                })
                ->toJson();
        }
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
        // Buat objek Mahal baru berdasarkan data yang diterima
        $dbulans = new Dbulan();
        $dbulans->danaks_id = $request->danaks_id;
        $dbulans->umur_periksa = $request->umur_periksa;
        $dbulans->bb_anak = $request->bb_anak;
        $dbulans->tb_anak = $request->tb_anak;

        $dbulans->st_anak = $request->st_anak;

        // Simpan objek Mahal ke dalam database
        $dbulans->save();
        Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('dbulanans.index');
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
        // ELOQUENT
        $dbulanan = Dantrian::find($id);


        $dbulanan->delete(); // Hapus data dari database
        Alert::success('Antrian Selesai');

        return redirect()->route('dbulanans.index');
    }
}
