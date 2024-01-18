<?php

namespace App\Http\Controllers;

use App\Charts\DetailChart;
use App\Exports\DbulanExport;
use App\Models\Danak;
use App\Models\Dantrian;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
        confirmDelete();
        return view("bidan.databulanan", compact('danaks', 'dbulans', 'dposyandu', 'title'));
    }

    public function getData(Request $request)
    {
        // Ambil bulan saat ini
        $currentMonth = now()->format('m');

        $dbulanans = Dbulan::with('danaks')->whereMonth('created_at', $currentMonth);

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


    public function exportbulanan(Request $request)
    {
        $posyandu = $request->input('nama_posyandu'); // Ambil posyandu dari permintaan
        $nama_posyandu = $posyandu;
        // Tanggal saat ini
        $tanggal = date('Y-m-d');
        return Excel::download(new DbulanExport($posyandu), 'Data-Bulanan-' . '(' . $nama_posyandu . ') ' . $tanggal . '.xlsx');
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
            return redirect()->route('dbulanans.index');
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
        return redirect()->route('dbulanans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $danaks_id, DetailChart $chart)
    {
        // ELOQUENT
        $title = "E-KMS Anak";
        $danak = Danak::findOrFail($danaks_id); // Mengambil data dari tabel 'danaks' berdasarkan 'danaks_id'

        $dbulanans = Dbulan::where('danaks_id', $danaks_id)->orderBy('created_at', 'asc')->get();
        $danaks = Danak::all();

        return view(
            'actions.detailbulanan',
            compact('dbulanans', 'title', 'danaks'),
            ['chart' => $chart->build($danak->jk)]
        );
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ELOQUENT
        $title = "Edit Data Bulanan Anak";
        $dbulanans = Dbulan::find($id);

        // Get danaks_id from the currently edited Dbulan
        $danaks_id = $dbulanans->danaks_id;

        // Fetch all Dbulans with the same danaks_id
        $relatedDbulanans = Dbulan::where('danaks_id', $danaks_id)->get();
        $danaks = Danak::all();

        return view(
            'actions.editbulanan',
            compact('dbulanans', 'danaks', 'title', 'relatedDbulanans'),
        );
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
        $dbulans->c_ukur = $request->c_ukur;

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
        // Temukan data bulanan berdasarkan ID
        $dantrian = Dantrian::find($id);

        // Periksa apakah data bulanan ditemukan
        if ($dantrian) {
            // Hapus data dari database
            $dantrian->delete();
            Alert::success('Antrian Selesai');
        } else {
            Alert::success('Antrian Selesai');
        }

        return redirect()->route('dbulanans.index');
    }

    public function destroy2()
    {
        // Ambil tanggal saat ini
        $currentDate = now()->toDateString();

        // Hapus data Dbulan dengan tanggal kurang dari tanggal saat ini
        Dbulan::whereDate('created_at', '<', $currentDate)
            ->delete();

        Alert::success('Data Terupdate');

        return redirect()->route('dbulanans.index');
    }

    public function destroy3(string $id)
    {
        // Temukan data bulanan berdasarkan ID
        $dbulanan = Dbulan::find($id);

        // Periksa apakah data bulanan ditemukan
        if ($dbulanan) {
            // Hapus data dari database
            $dbulanan->delete();
            Alert::success('Berhasil Terhapus', 'Data Anak Terhapus.');
        } else {
            Alert::success('Berhasil Terhapus', 'Data Anak Terhapus.');
        }

        return redirect()->route('dbulanans.index');
    }
}
