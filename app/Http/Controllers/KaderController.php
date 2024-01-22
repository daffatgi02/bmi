<?php

namespace App\Http\Controllers;

use App\Models\Danak;
use App\Models\Dantrian;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $danaks = Danak::all();
        $dbulans = Dbulan::all();
        $dposyandu = Dposyandu::all();
        return view('kader.index', compact('danaks', 'dbulans', 'dposyandu'));
    }
    public function getData2(Request $request)
    {

        $dantrians = Dantrian::all();

        if ($request->ajax()) {
            return datatables()->of($dantrians)
                ->addIndexColumn()
                ->addColumn('actions', function ($dantrian) {
                    return view('actions.actionantrian2', compact('dantrian'));
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
        $lastEntry = Dbulan::where('danaks_id', $request->danaks_id)
            ->where('nama_posyandu', $request->nama_posyandu)
            ->latest()
            ->first();

        // Cek entri terakhir dibuat dalam interval waktu 5 detil kalau misal spam, nanti muncul error
        if ($lastEntry && $lastEntry->created_at->gt(now()->subSeconds(5))) {
            Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');
            return redirect()->route('kaders.index');
        }
        // Buat objek Mahal baru berdasarkan data yang diterima
        $dbulans = new Dbulan();
        $dbulans->danaks_id = $request->danaks_id;
        $dbulans->umur_periksa = $request->umur_periksa;
        $dbulans->nama_posyandu = $request->nama_posyandu;
        $dbulans->umur_tahun = $request->umur_tahun;
        $dbulans->umur_bulan = $request->umur_bulan;
        $dbulans->bb_anak = $request->bb_anak;
        $dbulans->tb_anak = $request->tb_anak;
        $dbulans->lk_anak = $request->lk_anak;
        $dbulans->ll_anak = $request->ll_anak;

        $dbulans->st_anak = $request->st_anak;
        $dbulans->c_ukur = $request->c_ukur;

        // Simpan objek Mahal ke dalam database
        $dbulans->save();
        Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('kaders.index');
    }

    public function storekader(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik_anak' => 'required|numeric|digits:16',
            'nama_anak' => 'required|string|max:255',
            'nama_ortu' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|in:L,P',
            'dposyandu_id' => 'required|string|max:255',
            'nik_ortu' => 'required|numeric|digits:16',
            'hp_ortu' => 'required|numeric', // Merubah maksimal digit menjadi 13
        ], [
            'nik_anak.required' => 'Kolom NIK anak harus diisi.',
            'nik_anak.numeric' => 'NIK anak harus berupa angka.',
            'nik_anak.digits' => 'NIK anak harus terdiri dari 16 digit.',
            'hp_ortu.required' => 'Kolom Nomor WA harus diisi.',
            'hp_ortu.numeric' => 'Nomor WA harus berupa angka.',
        ]);


        if ($validator->fails()) {
            Alert::error('Gagal Menambahkan', 'Perisksa kembali data yang diinputkan.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cek entri terakhir berdasarkan yang di input sama user
        $lastEntry = Danak::where('nik_anak', $request->nik_anak)
            ->where('nik_ortu', $request->nik_ortu)
            ->latest()
            ->first();

        // Cek entri terakhir dibuat dalam interval waktu 5 detil kalau misal spam, nanti muncul error
        if ($lastEntry && $lastEntry->created_at->gt(now()->subSeconds(5))) {
            Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');
            return redirect()->back();
        }

        $danak = new Danak;
        $danak->nik_anak = $request->nik_anak;
        $danak->nama_anak = $request->nama_anak;
        $danak->tanggal_lahir = $request->tanggal_lahir;
        $danak->dposyandu_id = $request->dposyandu_id;
        $danak->jk = $request->jk;


        $danak->nik_ortu = $request->nik_ortu;
        $danak->nama_ortu = $request->nama_ortu;
        $danak->hp_ortu = $request->hp_ortu;

        // Simpan objek Mahal ke dalam database
        $danak->save();
        Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');

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
        // Temukan data kader berdasarkan ID
        $kader = Dantrian::find($id);

        // Periksa apakah data kader ditemukan
        if ($kader) {
            // Hapus data dari database
            $kader->delete();
            Alert::success('Antrian Selesai');
        } else {
            Alert::success('Antrian Selesai');
        }

        return redirect()->route('kaders.index');
    }
}
