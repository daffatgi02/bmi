<?php

namespace App\Http\Controllers;

use App\Models\Dbulan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    public function index()
    {
        $title = 'Riwayat';
        $riwayat = Riwayat::all();
        return view('bidan.riwayat', compact('title'));
    }

    public function getData(Request $request)
    {
        $riwayat = Riwayat::all();

        if ($request->ajax()) {
            return datatables()->of($riwayat)
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function store(Request $request)
    {
        // Buat objek Mahal baru berdasarkan data yang diterima
        $riwayat = new Riwayat();
        $riwayat->dbulans_id = $request->dbulans_id;
        $riwayat->nama = $request->nama;
        $riwayat->aktivitas = $request->aktivitas;
        $riwayat->data = $request->data;

        // Simpan objek Mahal ke dalam database
        $riwayat->save();
        Alert::success('Berhasil Memperbarui', 'Data Anak Berhasil Diperbarui.');

        return redirect()->route('dbulanans.index');
    }
}
