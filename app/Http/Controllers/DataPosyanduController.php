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
        $title = "Data Posyandu";
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

        // Cek entri terakhir berdasarkan yang di input sama user
        $lastEntry = Dposyandu::where('nama_posyandu', $request->nama_posyandu)
            ->where('pkm', $request->pkm)
            ->latest()
            ->first();

        // Cek entri terakhir dibuat dalam interval waktu 5 detil kalau misal spam, nanti muncul error
        if ($lastEntry && $lastEntry->created_at->gt(now()->subSeconds(5))) {
            Alert::success('Berhasil Menambahkan', 'Data Posyandu Berhasil Terinput.');
            return redirect()->back();
        }
        // Buat objek Mahal baru berdasarkan data yang diterima
        $dposyandu = new Dposyandu();
        $dposyandu->nama_posyandu = $request->nama_posyandu;
        $dposyandu->lokasi_posyandu = $request->lokasi_posyandu;
        $dposyandu->pkm = $request->pkm;
        $dposyandu->kel = $request->kel;
        $dposyandu->rt = $request->rt;
        $dposyandu->rw = $request->rw;

        // Simpan objek Mahal ke dalam database
        $dposyandu->save();
        Alert::success('Berhasil Menambahkan', 'Data Posyandu Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->back();
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
        $title = "Edit Data Posyandu";

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
        $dposyandu->pkm = $request->pkm;
        $dposyandu->kel = $request->kel;
        $dposyandu->rt = $request->rt;
        $dposyandu->rw = $request->rw;

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
        try {
            // ELOQUENT
            $dposyandus = Dposyandu::findOrFail($id); // Menggunakan findOrFail agar melempar error jika tidak ditemukan

            $dposyandus->delete(); // Hapus data dari database
            Alert::success('Berhasil Terhapus', 'Data Posyandu Terhapus.');
        } catch (\Exception $e) {
            Alert::error('Gagal Menghapus', 'Terjadi kesalahan dalam menghapus data.');
        }

        return redirect()->route('dposyandus.index');
    }
}
