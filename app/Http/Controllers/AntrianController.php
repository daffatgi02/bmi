<?php

namespace App\Http\Controllers;

use App\Models\Dantrian;
use App\Models\Dposyandu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dposyandu = Dposyandu::all();
        $dantrian = Dantrian::all();

        return view('ibubalita.index', compact('dposyandu', 'dantrian'));
    }

    public function getData(Request $request)
    {

        $dantrians = Dantrian::all();

        if ($request->ajax()) {
            return datatables()->of($dantrians)
                ->addIndexColumn()
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
        $dantrian = new Dantrian();
        $dantrian->n_antrian = $request->n_antrian;
        $dantrian->t_posyandu = $request->t_posyandu;

        // Simpan objek Mahal ke dalam database
        $dantrian->save();
        Alert::success('Berhasil Menambahkan', 'Data Antrian Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('antrians.index');
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
