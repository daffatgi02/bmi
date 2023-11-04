<?php

namespace App\Http\Controllers;

use App\Models\Danak;
use App\Models\Dposyandu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dposyandu = Dposyandu::all();
        return view("bidan.dataanak", compact('dposyandu'));
    }

    public function getData(Request $request)
    {

        $danaks = Danak::all();

        if ($request->ajax()) {
            return datatables()->of($danaks)
                ->addIndexColumn()
                ->addColumn('actions', function ($danak) {
                    return view('actions.actiondanak', compact('danak'));
                })
                ->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Buat objek Mahal baru berdasarkan data yang diterima
        $danak = new Danak;
        $danak->nama_anak = $request->nama_anak;
        $danak->tempat_lahir = $request->tempat_lahir;
        $danak->tanggal_lahir = $request->tanggal_lahir;
        $danak->umur = $request->umur;
        $danak->jk = $request->jk;
        $danak->t_posyandu = $request->t_posyandu;

        // Simpan objek Mahal ke dalam database
        $danak->save();
        Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('danaks.index');
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

        // ELOQUENT
        $danaks = Danak::find($id);

        $dposyandu = Dposyandu::all();

        return view('actions.editanak', compact('danaks', 'dposyandu'));
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
        $danak = Danak::find($id);


        $danak->delete(); // Hapus data dari database
        Alert::success('Berhasil Terhapus', 'Produk Berhasil Terhapus.');

        return redirect()->route('danaks.index');
    }
}
