<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'level' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'min:16 ', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/@gmail\.com$/i'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'level.required' => 'Kolom level harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
            'nik.required' => 'Kolom NIK harus diisi.',
            'nik.min' => 'NIK harus terdiri dari 16 digit.',
            'nik.max' => 'NIK harus terdiri dari 16 digit.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Email harus dalam format yang benar.',
            'email.unique' => 'Email sudah digunakan.',
            'email.regex' => 'Hanya email dengan domain @gmail.com yang diperbolehkan.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'level' => $data['level'],
            'status' => $data['status'],
            'name' => $data['name'],
            'nik' => $data['nik'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
    }
}
