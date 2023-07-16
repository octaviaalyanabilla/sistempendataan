<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\DataUM;
use App\Models\SuratKeluar;
use App\Models\SuratSurvei;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_keluar = SuratKeluar::get();
        $dataum = DataUM::get();
        $surat_survei = SuratSurvei::get();
        
        return view('home', compact('surat_keluar', 'dataum', 'surat_survei'));
    }
}
