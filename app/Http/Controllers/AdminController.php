<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Admin';
        $riwayat = Riwayat::all();
        return view('admin.admin', compact('title'));
    }

    public function indexvalidasi()
    {
        $title = 'Data Akun';
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
}
