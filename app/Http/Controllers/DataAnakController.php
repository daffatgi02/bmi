<?php

namespace App\Http\Controllers;

use App\Charts\DetailChart;
use App\Models\Danak;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Anak";
        $dposyandu = Dposyandu::all();
        confirmDelete();
        return view("bidan.dataanak", compact('title', 'dposyandu'));
    }

    public function getData(Request $request)
    {

        $danaks = Danak::with('dposyandu');

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
            return redirect()->route('danaks.index');
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
        return redirect()->route('danaks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $danaks_id, DetailChart $chart)
    {
        // ELOQUENT
        $title = "E-KMS Anak";
        $dbulanans = Dbulan::where('danaks_id', $danaks_id)->orderBy('created_at', 'asc')->get();
        $danaks = Danak::all();

        return view(
            'actions.detailbulanan',
            compact('dbulanans', 'title', 'danaks'),
            ['chart' => $chart->build($danaks_id)]
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Data Anak";
        $danaks = Danak::find($id);
        $dposyandu = Dposyandu::all();

        return view('actions.editanak', compact('danaks', 'dposyandu', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        $danak = Danak::findOrFail($id);

        // Update data anak berdasarkan ID yang diterima
        $danak->nik_anak = $request->nik_anak;
        $danak->nama_anak = $request->nama_anak;
        $danak->tanggal_lahir = $request->tanggal_lahir;
        $danak->jk = $request->jk;
        $danak->dposyandu_id = $request->dposyandu_id;

        $danak->nik_ortu = $request->nik_ortu;
        $danak->nama_ortu = $request->nama_ortu;
        $danak->hp_ortu = $request->hp_ortu;

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
        try {
            $danak = Danak::find($id);

            if ($danak) {
                $danak->delete(); // Hapus data dari database
                Alert::success('Berhasil Terhapus', 'Data Anak Terhapus.');
            } else {
                Alert::error('Gagal Menghapus', 'Data Anak Masih Terikat pada Data Bulanan.');
            }
        } catch (\Exception $e) {
            Alert::error('Gagal Menghapus', 'Data Anak Masih Terikat pada Data Bulanan.');
        }

        return redirect()->route('danaks.index');
    }
}
