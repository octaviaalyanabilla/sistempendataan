<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUM;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DataUMController extends Controller
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

        $data_um = DataUM::where('validasi', 'Belum')->get();
        //dd($data_um);
        return view('data_um.index', compact('data_um'));
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

        return view('data_um.create');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'importData' => 'required'
        ]);

        if ($request->hasFile('importData')) {
            $path = $request->file('importData')->getRealPath();

            $data_um = Excel::load($path, function($reader){})->get();
            $a = collect($data_um);

            if (!empty($a) && $a->count()) {
                foreach ($a as $key => $value) {
                    $insert[] = [
                            'nama_data' => $value->nama_data];

                    DataUM::create($insert[$key]);
                        
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
            'nama_data' => 'required|string|max:255'
        ]);

        DataUM::create([
                'nama_data' => $request->get('nama_data'),
                'nik' => $request->get('nik'),
                'nomor_kk' => $request->get('nomor_kk'),
                'alamat' => $request->get('alamat'),
                'bidang_usaha'=> $request->get('bidang_usaha'),
                'jenis_usaha' => $request->get('jenis_usaha'),
                'telepon' => $request->get('telepon'),
                'sku' => $request->get('sku'),
                'omset' => $request->get('omset'),
                'aset' => $request->get('aset'),
                'pemasaran' => $request->get('pemasaran'),
                'tk' => $request->get('tk')
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('data_um.index');

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

        $data_um = DataUM::findOrFail($id);

        return view('data_um.show', compact('data_um'));
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

        $data_um = DataUM::findOrFail($id);
        return view('data_um.edit', compact('data_um'));
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
        DataUM::find($id)->update([
            'nama_data' => $request->get('nama_data'),
            'nik' => $request->get('nik'),
            'nomor_kk' => $request->get('nomor_kk'),
            'alamat' => $request->get('alamat'),
            'bidang_usaha'=> $request->get('bidang_usaha'),
            'jenis_usaha' => $request->get('jenis_usaha'),
            'telepon' => $request->get('telepon'),
            'sku' => $request->get('sku'),
            'omset' => $request->get('omset'),
            'aset' => $request->get('aset'),
            'pemasaran' => $request->get('pemasaran'),
            'tk' => $request->get('tk')
        ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('data_um.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataUM::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('data_um.index');
    }

    public function validasi(Request $request, $id)
    {
        // dd($request->all());
        DataUM::where('id', $id)->update([
            'validasi' => $request->validasi
        ]);

        alert()->success('Berhasil.','Data telah valid!');
        return redirect()->route('data_um.index');
    }

    public function rekap(Request $request, $id)
    {
        // dd($request->all());
        $data_um = DataUM::where('validasi', 'Valid')->get();

        alert()->success('Berhasil.','Data telah valid!');
        return view('data_um.rekap', compact('data_um'));
    }
}
