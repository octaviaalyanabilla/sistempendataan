<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disposisi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DisposisiController extends Controller
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
 
         $disposisi = Disposisi::get();
         //dd($disposisi);
         return view('disposisi.index', compact('disposisi'));
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
 
         return view('disposisi.create');
     }
 
     public function import(Request $request)
     {
         $this->validate($request, [
             'importData' => 'required'
         ]);
 
         if ($request->hasFile('importData')) {
             $path = $request->file('importData')->getRealPath();
 
             $disposisi = Excel::load($path, function($reader){})->get();
             $a = collect($disposisi);
 
             if (!empty($a) && $a->count()) {
                 foreach ($a as $key => $value) {
                     $insert[] = [
                             'nama_data' => $value->nama_data];
 
                     Disposisi::create($insert[$key]);
                         
                     }
                   
             };
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
             'surat_id' => 'required|string|max:255'
         ]);
 
         Disposisi::create([
                 'surat_id' => $request->get('surat_id'),
                 'tipe' => $request->get('tipe'),
                 'admin_approval' => $request->get('admin_approval'),
                 'kabid_approval' => $request->get('kabid_approval'),
                 'kadin_approval'=> $request->get('kadin_approval'),
                 'jenis_usaha' => $request->get('jenis_usaha'),
             ]);
 
         alert()->success('Berhasil.','Data telah ditambahkan!');
 
         return redirect()->route('disposisi.index');
 
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
 
         $disposisi = Disposisi::findOrFail($id);
 
         return view('disposisi.show', compact('disposisi'));
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
 
         $disposisi = Disposisi::findOrFail($id);
         return view('disposisi.edit', compact('disposisi'));
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
         Disposisi::find($id)->update([
             'nama_data' => $request->get('nama_data')
         ]);
 
         alert()->success('Berhasil.','Data telah diubah!');
         return redirect()->route('disposisi.index');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     
 }

