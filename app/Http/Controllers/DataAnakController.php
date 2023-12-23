<?php

namespace App\Http\Controllers;

use App\Models\Danak;
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
        return view("bidan.dataanak", compact('dposyandu', 'title'));
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

        $validator = Validator::make($request->all(), [
            'nama_anak' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            't_posyandu' => 'required|string|max:255',
            'nik_anak' => 'required|numeric|digits:16',
            'nowa' => 'required|numeric', // Merubah maksimal digit menjadi 13
        ], [
            'nik_anak.required' => 'Kolom NIK anak harus diisi.',
            'nik_anak.numeric' => 'NIK anak harus berupa angka.',
            'nik_anak.digits' => 'NIK anak harus terdiri dari 16 digit.',
            'nowa.required' => 'Kolom Nomor WA harus diisi.',
            'nowa.numeric' => 'Nomor WA harus berupa angka.',
        ]);


        if ($validator->fails()) {
            Alert::error('Gagal Menambahkan', 'Perisksa kembali data yang diinputkan.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $danak = new Danak;
        $danak->nama_anak = $request->nama_anak;
        $danak->tempat_lahir = $request->tempat_lahir;
        $danak->tanggal_lahir = $request->tanggal_lahir;


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
            'nama_anak' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            't_posyandu' => 'required|string|max:255',
            'nik_anak' => 'required|numeric|digits:16',
            'nowa' => 'required|numeric|digits:13', // Mengubah maksimal digit menjadi 13
        ], [
            'nik_anak.required' => 'Kolom NIK anak harus diisi.',
            'nik_anak.numeric' => 'NIK anak harus berupa angka.',
            'nik_anak.digits' => 'NIK anak harus terdiri dari 16 digit.',
            'nowa.required' => 'Kolom Nomor WA harus diisi.',
            'nowa.numeric' => 'Nomor WA harus berupa angka.',
            'nowa.digits' => 'Nomor WA harus terdiri dari 13 digit.',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal Memperbarui', 'Periksa kembali data yang diinputkan.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $danak = Danak::findOrFail($id);

        // Update data anak berdasarkan ID yang diterima
        $danak->nama_anak = $request->nama_anak;
        $danak->tempat_lahir = $request->tempat_lahir;
        $danak->tanggal_lahir = $request->tanggal_lahir;

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
