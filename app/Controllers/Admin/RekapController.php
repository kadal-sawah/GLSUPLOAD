<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function index()
    {
        //
    }

    public function diklat()
    {
        return view('Admin/Rekap/diklat');
    }

    public function book()
    {
        return view('Admin/Rekap/book');
    }

    public function review()
    {
        return view('Admin/Rekap/review');
    }

    public function diorama()
    {
        return view('Admin/Rekap/diorama');
    }
    
    public function literasi()
    {
        return view('Admin/Rekap/literasi');
    }

    public function video()
    {
        return view('Admin/Rekap/video');
    }

    public function partisipasi()
    {
        return view('Admin/Rekap/partisipasi');
    }

    public function karya()
    {
        return view('Admin/Rekap/karya');
    }
}