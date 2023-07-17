<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUM;
use App\Models\Anggota;
use App\Models\SuratSurvei;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class RekapController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this -> middleware('auth');
    }

    public function data() {
        return view('rekap.data');
    }

    public function dataPdf() {

        $users = User::get();
        $data_um = DataUM::get();
        $surat_survei = SuratSurvei::get();
        $surat_keluar = SuratKeluar::get();
        $pdf = PDF::loadView('rekap.data_pdf', compact('data_um','surat_survei', 'surat_keluar'));
        return $pdf -> download('rekap_data_'.date('Y-m-d_H-i-s').
            '.pdf');
    }
}