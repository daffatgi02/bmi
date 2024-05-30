<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class BidanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Jika pengguna aktif dan levelnya kader, izinkan akses.
            if (Auth::user()->level === 'bidan' && Auth::user()->status === 'Aktif') {
                return $next($request);
            }

            // Jika pengguna belum aktif, arahkan ke halaman home.
            if (Auth::user()->status === 'Belum Aktif') {
                return redirect()->to('/home');
            }
        }

        // Untuk semua kasus lainnya (misalnya, pengguna tidak aktif atau bukan kader), arahkan ke halaman bidan dengan pesan kesalahan.
        return redirect()->route('pposyandu')->with('error', 'Access denied. You need admin privileges.');
    }
}
