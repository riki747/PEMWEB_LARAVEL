<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //fungsi untuk menampilkan halaman homepage
    public function index()
    {
        return view('web.homepage');
    }
}
