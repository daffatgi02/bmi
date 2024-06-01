<?php

namespace App\Http\Controllers;

use App\Charts\GrafikdashboardChart;
use App\Models\Danak;
use App\Models\Dantrian;
use App\Models\Dbulan;
use App\Models\Dposyandu;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(GrafikdashboardChart $chart)
    {
        $title = 'Admin';
        $users = User::where('level', '!=', 'admin')->get();
        $dbulans = Dbulan::all();
        $riwayats = Riwayat::all();
        $dposyandus = Dposyandu::all();
        $danaks = Danak::all();
        $dantrians = Dantrian::all();
        return view('admin.admin', compact('title', 'users', 'dbulans', 'riwayats', 'dposyandus', 'danaks', 'dantrians'),['chart' => $chart->build()] );
    }

    public function indexvalidasi()
    {
        $title = 'Data Akun';
        confirmDelete();
        $users = User::where('level', '!=', 'admin')->get();
        return view('admin.validasi', compact('title', 'users'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string'
        ]);

        $user = User::find($request->id);
        if ($user) {
            $user->status = $request->status;
            $user->save();
            return response()->json(['message' => 'Status updated successfully']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function indexriwayat()
    {
        $title = 'Riwayat';
        $riwayat = Riwayat::all();
        return view('admin.riwayat', compact('title'));
    }

    public function destroy(string $id)
    {
        // Temukan data bulanan berdasarkan ID
        $user = User::find($id);

        // Periksa apakah data bulanan ditemukan
        if ($user) {
            // Hapus data dari database
            $user->delete();
            Alert::success('Berhasil Terhapus', 'Akun Berhasil Terhapus.');
        } else {
            Alert::success('Berhasil Terhapus', 'Akun Berhasil Terhapus.');
        }

        return redirect()->route('admins.validasi');
    }
}
