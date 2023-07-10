<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUM;
use App\Models\SuratSurvei;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SuratSurveiController extends Controller
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
 
         $surat_survei = SuratSurvei::get();
         return view('surat_survei.index', compact('surat_survei'));
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
 
         return view('surat_survei.create');
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
             'judul_surat' => 'required|string|max:255'
         ]);
 
         SuratSurvei::create([
                 'judul_surat' => $request->get('judul_surat'),
             ]);
 
         alert()->success('Berhasil.','Data telah ditambahkan!');
 
         return redirect()->route('suratsurvei.index');
 
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
 
         $surat_survei = SuratSurvei::findOrFail($id);
 
         return view('surat_survei.show', compact('surat_survei'));
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
 
         $surat_survei = SuratSurvei::findOrFail($id);
         return view('surat_survei.edit', compact('surat_survei'));
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
         SuratSurvei::find($id)->update([
             'judul_surat' => $request->get('judul_surat')
         ]);
 
         alert()->success('Berhasil.','Data telah diubah!');
         return redirect()->route('surat_survei.index');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         SuratSurvei::find($id)->delete();
         alert()->success('Berhasil.','Data telah dihapus!');
         return redirect()->route('surat_survei.index');
     }
 }
