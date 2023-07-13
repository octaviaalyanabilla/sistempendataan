<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUM;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function index()
     {
         if(Auth::user()->level == 'user') {
             Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
             return redirect()->to('/');
         }
 
         $surat_keluar = SuratKeluar::get();
         return view('surat_keluar.index', compact('surat_keluar'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         if(Auth::user()->level == 'user') {
             Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
             return redirect()->to('/');
         }
 
         return view('surat_keluar.create');
     }
 
     public function import(Request $request)
     {
         $this->validate($request, [
             'importData' => 'required'
         ]);
        
         if($request->file('docpdf') == '') {
            $docpdf = NULL;
        } else {
            $file = $request->file('docpdf');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('docpdf')->move("document/surat", $fileName);
            $docpdf = $fileName;
        }
                   
         
         alert()->success('Berhasil.','Data telah diimport!');
         return back();
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $this->validate($request, [
            'no_suratsk' => 'required|string|max:255',
            'pengirimsk' => 'required|string|max:255',
            'perihalsk' => 'required|string|max:255',
            'tgl_sk' => 'required|string|max:255',
            'file_surat_keluar'=>'required|string|max:255',
            'jenis_sk' => 'required'

         ]);
         if($request->file('file_surat_keluar') == '') {
            $file_surat_keluar = NULL;
        } else {
            $file = $request->file('file_surat_keluar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('file_surat_keluar')->move("document/surat", $fileName);
            $file_surat_keluar = $fileName;
        }

 
         SuratKeluar::create([
                 'surat_keluar' => $request->get('surat_keluar'),
                 'no_suratsk' => $request->get('no_suratsk'),
                 'pengirimsk' => $request->get('pengirimsk'),
                 'perihalsk' => $request->get('perihal_sk'),
                 'tgl_sk' => $request->get('tgl_sk'),
                 'file_surat_keluar' => $file_surat_keluar,
                 'jenis_sk' => $request->get('jenis_sk'),

             ]);
 
         alert()->success('Berhasil.','Data telah ditambahkan!');
 
         return redirect()->route('surat_keluar.index');
 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
             Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
             return redirect()->to('/');
     }
 
         $surat_keluar = SuratKeluar::findOrFail($id);
 
         return view('surat_keluar.show', compact('surat_keluar'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {   
         if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
             Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
             return redirect()->to('/');
     }
 
         $surat_keluar = SuratKeluar::findOrFail($id);
         return view('surat_keluar.edit', compact('surat_keluar'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         SuratKeluar::find($id)->update([
             'surat_keluar' => $request->get('surat_keluar')
         ]);
 
         alert()->success('Berhasil.','Data telah diubah!');
         return redirect()->route('surat_keluar.index');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         SuratKeluar::find($id)->delete();
         alert()->success('Berhasil.','Data telah dihapus!');
         return redirect()->route('surat_keluar.index');
     }
 }
