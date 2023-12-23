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
        $title = "Data Bulanan";
        $danaks = Danak::all();
        $dbulans = Dbulan::all();
        $dposyandu = Dposyandu::all();
        return view("bidan.databulanan", compact('danaks', 'dbulans', 'dposyandu', 'title'));
    }

    public function getData(Request $request)
    {

        $dbulanans = Dbulan::with('danaks');

        if ($request->ajax()) {
            return datatables()->of($dbulanans)
                ->addIndexColumn()
                ->addColumn('actions2', function ($dbulanan) {
                    return view('actions.actionbulanan', compact('dbulanan'));
                })
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
        $dbulans->lk_anak = $request->lk_anak;
        $dbulans->ll_anak = $request->ll_anak;

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
        // ELOQUENT
        $title = "Edit Data Bulanan Anak";
        $dbulanans = Dbulan::find($id);
        $danaks = Danak::all();

        return view('actions.editbulanan', compact('dbulanans', 'danaks', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dbulans = Dbulan::findOrFail($id);

        // Update data berdasarkan ID yang diterima
        $dbulans->danaks_id = $request->danaks_id;

        $dbulans->umur_periksa = $request->umur_periksa;
        $dbulans->bb_anak = $request->bb_anak;
        $dbulans->tb_anak = $request->tb_anak;
        $dbulans->lk_anak = $request->lk_anak;
        $dbulans->ll_anak = $request->ll_anak;
        $dbulans->st_anak = $request->st_anak;

        $dbulans->created_at = $request->created_at;
        $dbulans->updated_at = $request->updated_at;
        // Simpan perubahan data ke dalam database
        $dbulans->save();
        Alert::success('Berhasil Memperbarui', 'Data Anak Berhasil Diperbarui.');

        // Redirect ke halaman yang sesuai setelah perubahan data
        return redirect()->route('dbulanans.index');
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
