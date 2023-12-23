<?php

namespace App\Http\Controllers;

use App\Models\Dposyandu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Data Posyandu";
        confirmDelete();
        return view("bidan.dataposyandu", compact('title'));
    }

    public function getData(Request $request)
    {

        $dposyandus = Dposyandu::all();

        if ($request->ajax()) {
            return datatables()->of($dposyandus)
                ->addIndexColumn()
                ->addColumn('actions', function ($dposyandu) {
                    return view('actions.actiondposyandu', compact('dposyandu'));
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
        $dposyandu = new Dposyandu();
        $dposyandu->nama_posyandu = $request->nama_posyandu;
        $dposyandu->lokasi_posyandu = $request->lokasi_posyandu;

        // Simpan objek Mahal ke dalam database
        $dposyandu->save();
        Alert::success('Berhasil Menambahkan', 'Data Posyandu Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('dposyandus.index');
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
        $title="Edit Data Posyandu";

        // ELOQUENT
        $dposyandus = Dposyandu::find($id);


        return view('actions.editposyandu', compact('dposyandus', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dposyandu = Dposyandu::findOrFail($id);

        // Update data posyandu berdasarkan ID yang diterima
        $dposyandu->nama_posyandu = $request->nama_posyandu;
        $dposyandu->lokasi_posyandu = $request->lokasi_posyandu;

        // Simpan perubahan data posyandu ke dalam database
        $dposyandu->save();
        Alert::success('Berhasil Memperbarui', 'Data Posyandu Berhasil Diperbarui.');

        // Redirect ke halaman yang sesuai setelah pembaruan data
        return redirect()->route('dposyandus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $dposyandus = Dposyandu::find($id);


        $dposyandus->delete(); // Hapus data dari database
        Alert::success('Berhasil Terhapus', 'Data Posyandu Terhapus.');

        return redirect()->route('dposyandus.index');
    }
}
