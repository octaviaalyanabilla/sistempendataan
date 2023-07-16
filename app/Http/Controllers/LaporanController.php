<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUM;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller 
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
        return view('laporan.data');
    }

    public function dataPdf() {

        $users = User::get();
        $data_um = DataUM::get();
        $pdf = PDF::loadView('laporan.data_pdf', compact('data_um'
        // ,'nik','nomor_kk','alamat','bidang_usaha', 'jenis_usaha', 'telepon', 'sku', 'omset', 'aset', 'pemasaran', 'tk'
    ));
        return $pdf -> download('laporan_data_'.date('Y-m-d_H-i-s').
            '.pdf');
    }
}