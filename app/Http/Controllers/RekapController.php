<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUM;
use App\Models\Anggota;
use App\Models\SuratSurvei;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
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

    public function data(Request $request) {

        $get_data_um = DB::table('data_um');
        $get_data_um->where('validasi', 'Valid');
        if($request->start_date_data_um != null)
        {
            $get_data_um->whereBetween('created_at', [$request->start_date_data_um,$request->end_date_data_um]);
        }
        $data_um=$get_data_um->get();
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        
        $get_surat_survei = DB::table('surat_survei');
        if($request->start_date_surat_survei != null)
        {
            $get_surat_survei->whereBetween('tgl_surat', [$request->start_date_surat_survei,$request->end_date_surat_survei]);
        }
        $surat_survei = $get_surat_survei->get();
        $disposisi = [];
        foreach ($surat_survei as $key => $value) {
            $disposisi[$key] = 0;
           $data = Disposisi::where('surat_id', $value->id)->where('tipe', 'survei')->first();
           if(Auth::user()->level == 'admin'){
               $disposisi[$key] = $data->admin_approval;
           }
       
           if(Auth::user()->level == 'kepala bidang um'){
               $disposisi[$key] = $data->kabid_approval;
           } else {
             
                   $disposisi[$key] = $data->kadin_approval;
           }
        }
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $get_surat_keluar = DB::table('surat_keluar');
        if($request->start_date_surat_keluar != null)
        {
            $get_surat_keluar->whereBetween('tgl_sk', [$request->start_date_surat_keluar,$request->end_date_surat_keluar]);
        }
        $surat_keluar = $get_surat_keluar->get();
        //dd($surat_keluar);
        $disposisi = [];
        foreach ($surat_keluar as $key => $value) {
            $disposisi[$key] = 0;
           $data = Disposisi::where('surat_id', $value->id)->where('tipe', 'keluar')->first();
           if(Auth::user()->level == 'admin'){
               $disposisi[$key] = $data->admin_approval;
           }
       
           if(Auth::user()->level == 'kepala bidang um'){
               $disposisi[$key] = $data->kabid_approval;
           } else {
             
                   $disposisi[$key] = $data->kadin_approval;
           }
       }
        return view('rekap.rekap', compact('data_um', 'disposisi', 'surat_survei', 'surat_keluar', 'request'));
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