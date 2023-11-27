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
        confirmDelete();
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
        $danak = new Danak;
        $danak->nama_anak = $request->nama_anak;
        $danak->tempat_lahir = $request->tempat_lahir;
        $danak->tanggal_lahir = $request->tanggal_lahir;

        $dateOfBirth = \Carbon\Carbon::parse($request->tanggal_lahir);
        $now = \Carbon\Carbon::now();
        $umur = $now->diff($dateOfBirth);

        if ($umur->y < 1) {
            $umurTotal = $umur->m . " bulan";
        } else {
            $umurTotal = $umur->y . " tahun";
        }

        $danak->umur = $umurTotal;
        $danak->jk = $request->jk;
        $danak->t_posyandu = $request->t_posyandu;
        $danak->nik_anak = $request->nik_anak;
        $danak->nowa = $request->nowa;

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
        $danak = Danak::findOrFail($id);

        // Update data anak berdasarkan ID yang diterima
        $danak->nama_anak = $request->nama_anak;
        $danak->tempat_lahir = $request->tempat_lahir;
        $danak->tanggal_lahir = $request->tanggal_lahir;

        $dateOfBirth = \Carbon\Carbon::parse($request->tanggal_lahir);
        $now = \Carbon\Carbon::now();
        $umur = $now->diff($dateOfBirth);

        if ($umur->y < 1) {
            $umurTotal = $umur->m . " bulan";
        } else {
            $umurTotal = $umur->y . " tahun";
        }

        $danak->umur = $umurTotal;
        $danak->jk = $request->jk;
        $danak->t_posyandu = $request->t_posyandu;
        $danak->nik_anak = $request->nik_anak;
        $danak->nowa = $request->nowa;

        // Simpan perubahan data anak ke dalam database
        $danak->save();
        Alert::success('Berhasil Memperbarui', 'Data Anak Berhasil Diperbarui.');

        // Redirect ke halaman yang sesuai setelah pembaruan data
        return redirect()->route('danaks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $danak = Danak::find($id);


        $danak->delete(); // Hapus data dari database
        Alert::success('Berhasil Terhapus', 'Data Anak Terhapus.');

        return redirect()->route('danaks.index');
    }
}
