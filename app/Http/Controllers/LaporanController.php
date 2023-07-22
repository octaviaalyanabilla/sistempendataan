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

    public function data(Request $request) 
    {
        $data_um = DataUM::where('validasi', 'Valid')->first();

        return view('laporan.data', compact('data_um', 'request'));

    }

    public function dataPdfKeluar(Request $request) {

        $get_surat_keluar = DB::table('surat_keluar');
        if($request->start_date_surat_keluar != null)
        {
            $get_surat_keluar->whereBetween('tgl_sk', [$request->start_date_surat_keluar,$request->end_date_surat_keluar]);
        }
        $surat_keluar = $get_surat_keluar->get();
        $pdf = PDF::loadView('laporan.datakeluar_pdf', compact('surat_keluar'
       
    ));
        return $pdf -> download('laporan_datakeluar_'.date('Y-m-d_H-i-s').
            '.pdf');
    }
    public function dataPdfSurvei(Request $request) {

        $get_surat_survei = DB::table('surat_survei');
        if($request->start_date_surat_survei != null)
        {
            $get_surat_survei->whereBetween('tgl_surat', [$request->start_date_surat_survei,$request->end_date_surat_survei]);
        }
        $surat_survei = $get_surat_survei->get();
        $pdf = PDF::loadView('laporan.datasurvei_pdf', compact('surat_survei'
       
    ));
        return $pdf -> download('laporan_datasurvei_'.date('Y-m-d_H-i-s').
            '.pdf');
    }
    public function dataPdfUM(Request $request) {

        $get_data_um = DB::table('data_um');
        if($request->start_date_data_um != null)
        {
            $get_data_um->whereBetween('created_at', [$request->start_date_data_um, $request->end_date_data_um]);
        }
        $data_um = $get_data_um->get();
        $pdf = PDF::loadView('laporan.dataum_pdf', compact('data_um'))->setPaper('a4', 'landscape');
        return $pdf -> download('laporan_dataum_'.date('Y-m-d_H-i-s').
            '.pdf');
    }
}