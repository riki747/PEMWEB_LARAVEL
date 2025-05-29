<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class CustomerAuthController extends Controller
{
    // fungsi untuk menampilkan halaman login
    public function login()
    {
        return view('web.customer.login', [
            'title' => 'Login'
        ]);
    }

    // fungsi untuk menyimpan data login
    public function register()
    {
        return view('web.customer.register', [
            'title' => 'Register'
        ]);
    }

    // fungsi untuk menyimpan data register
    public function store_register(Request $request)
    {
        // validasi data yang dikirimkan
        $validasi = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:customers,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        // jika validasi gagal, maka redirect ke halaman register
        if ($validasi->fails()) {
            return redirect()->back()
                ->with('errorMessage', 'Validasi error, silahkan cek kembali data anda')
                ->withErrors($validasi)
                ->withInput();
        } else {
            // jika validasi berhasil, maka simpan data ke database
            $customer = new Customers();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->save();
            //jika berhasil tersimpan, maka redirect ke halaman login
            return redirect()->route('customer.login')
                ->with('successMessage', 'Registrasi Berhasil');
        }
    }

    public function store_login(Request $request)
    {
        // validasi data yang dikirimkan
        $credentials = $request->only('email', 'password');
        $validasi = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // jika validasi gagal, maka redirect ke halaman login
        if ($validasi->fails()) {
            return redirect()->back()
                ->with('errorMessage', 'Validasi error, silahkan cek kembali data anda')
                ->withErrors($validasi)
                ->withInput();
        }

        // jika validasi berhasil, maka lakukan login
        $customer = Customers::where('email', $credentials['email'])->first();
        if ($customer && Hash::check($credentials['password'], $customer->password)) {
            // Login
            Auth::guard('customer')->login($customer);
            // jika login berhasil, maka redirect ke halaman dashboard
            return redirect()->route('customer.dashboard')
                ->with('successMessage', 'Login berhasil');
        } else {
            // jika login gagal, maka redirect ke halaman login
            return redirect()->back()
                ->with('errorMessage', 'Email atau password salah')
                ->withInput();
        }
    }

    // fungsi untuk logout
    public function logout(Request $request)
    {
        // lakukan logout
        Auth::guard('customer')->logout();
// ==========
        // baru
        $request->session()->invalidate();
        // hapus session
        $request->session()->regenerateToken();
// ==========
        // redirect ke halaman login
        return redirect()->route('customer.login')
            ->with('successMessage', 'Logout berhasil');
    }

    // fungsi untuk menampilkan halaman dashboard
    public function dashboard()
    {
        return view('web.customer.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

}


