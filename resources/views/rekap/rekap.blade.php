@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable({
            "iDisplayLength": 50
        });
        
        $('#table1').DataTable({
            "iDisplayLength": 50
        });

        $('#table2').DataTable({
            "iDisplayLength": 50
        });
    });

</script>
@stop
@extends('layouts.app')

@section('content')

<div class="row">
<form action="{{url('rekap/data')}}" class="col-lg-12">
<div class="col-md-12 row">
    <div class="col-md-5">
        <input id="tgl_sk" type="datetime-local" class="form-control" name="start_date_data_um" placeholder="Tanggal"
        value="{{ $request->start_date_data_um }}" required>
    </div>
    <div class="col-md-5">
        <input id="tgl_sk" type="datetime-local" class="form-control" name="end_date_data_um" placeholder="Tanggal"
        value="{{ $request->end_date_data_um }}" required>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" id="filter">Filter</button>
    </div>
    </div>
</div>
</form>


<div class="row">
    <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
            {{ Session::get('message') }}</div>
        @endif
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pull-left">Data UM</h4>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>
                                    Nama Pelaku Usaha
                                </th>
                                <th>
                                    NIK
                                </th>
                                <th>
                                    Nomor KK
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Bidang Usaha
                                </th>
                                <th>
                                    Jenis Usaha
                                </th>
                                <th>
                                    Telepon
                                </th>
                                <th>
                                    SKU/NIB
                                </th>
                                <th>
                                    Omset (pertahun)
                                </th>
                                <th>
                                    Aset Usaha
                                </th>
                                <th>
                                    Pemasaran
                                </th>
                                <th>
                                    Jumlah Tenaga Kerja
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_um as $data_ums)
                            <tr>
                                <td>{{$data_ums->nama_data}}</td>
                                <td>{{$data_ums->nik}}</td>
                                <td>
                                    {{$data_ums->nomor_kk}}
                                </td>
                                <td>{{$data_ums->alamat}}</td>
                                <td>{{$data_ums->bidang_usaha}}</td>
                                <td>{{$data_ums->jenis_usaha}}</td>
                                <td>{{$data_ums->telepon}}</td>
                                <td>{{$data_ums->sku}}</td>
                                <td>{{$data_ums->omset}}</td>
                                <td>{{$data_ums->aset}}</td>
                                <td>{{$data_ums->pemasaran}}</td>
                                <td>{{$data_ums->tk}}</td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="{{route('data_um.edit', $data_ums->id)}}"> Edit </a>
                                            <form action="{{ route('data_um.destroy', $data_ums->id) }}" class="pull-left"
                                                method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    Delete
                                                </button>
                                            </form>
                                                <form action="{{ url('data_um/validasi/'. $data_ums->id)}}"  >
                                                <button class="dropdown-item" name = "validasi" value = "Valid" type = "submit"> Validasi </button>
                                                <div class="btn-group dropdown">
                                                </form>
                                            

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--  {!! $data_ums->links() !!} --}}
            </div>
        </div>
    </div>
</div>

<form action="{{url('rekap/data')}}" class="col-lg-12">
<div class="col-md-12 row">
    <div class="col-md-5">
        <input id="tgl_sk" type="date" class="form-control" name="start_date_surat_survei" placeholder="Tanggal"
        value="{{ $request->start_date_surat_survei }}" required>
    </div>
    <div class="col-md-5">
        <input id="tgl_sk" type="date" class="form-control" name="end_date_surat_survei" placeholder="Tanggal"
        value="{{ $request->end_date_surat_survei }}" required>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" id="filter">Filter</button>
    </div>
    </div>
</form>
<div class="row">
    <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
            {{ Session::get('message') }}</div>
        @endif
    </div>
</div>

<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title pull-left">Surat Masuk</h4>
                {{-- <a href="{{url('format_data')}}" class="btn btn-xs btn-info pull-right">Format data</a> --}}
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>
                                    Nomor
                                </th>
                                <th>
                                    Nomor Surat
                                </th>
                                <th>
                                    Pengirim
                                </th>
                                <th>
                                    Perihal
                                </th>
                                <th>
                                    Tanggal Surat
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($surat_survei as $key=> $surat_surveis)
                            <tr>
                                <td class="py-1">
                                    <a href="{{route('surat_survei.show', $surat_surveis->id)}}">
                                        {{$surat_surveis->id}}
                                    </a>
                                </td>
                                <td>
                                    {{$surat_surveis->no_surat}}
                                </td>
                                <td>
                                    {{$surat_surveis->pengirim}}
                                </td>
                                <td>
                                    {{$surat_surveis->perihal}}
                                </td>
                                <td>
                                    {{$surat_surveis->tgl_surat}}
                                </td>
                                <td>
                                    @if(isset($disposisi[$key]))
                                        @if($disposisi[$key] == 2) 
                                        <a style="color:green;"> Terdisposisi </a>
                                        @elseif($disposisi[$key] == 1)
                                        <a style="color:blue;"> Menunggu </a>
                                        @else
                                        <a style="color:red;"> Belum Terdisposisi</a>
                                        @endif
                                    @endif
                                    
                                   
                                </td>
                                <td>
                                @if(Auth::user()->level == 'admin')
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="{{route('surat_survei.edit', $surat_surveis->id)}}"> Edit </a>
                                            <form action="{{ route('surat_survei.destroy', $surat_surveis->id) }}" class="pull-left"
                                                method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    Delete
                                                </button>
                                                <a class="dropdown-item" href="{{route('surat_survei.show', $surat_surveis->id)}}"> Detail </a>
                                                <div class="btn-group dropdown">

                                            </form>
                                            @elseif(Auth::user()->level == 'kepala bidang um')
                                            <a class="btn btn-info" href="{{route('surat_survei.detail', ['id'=>$surat_surveis->id])}}">Lihat</a>
                                            @else
                                            <a class="btn btn-info" href="{{route('surat_survei.detail',['id'=>$surat_surveis->id])}}">Lihat</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--  {!! $surat_surveis->links() !!} --}}
            </div>
            
        </div>
    </div>
</div>

<form action="{{url('rekap/data')}}" class="col-lg-12">
<div class="col-md-12 row">
    <div class="col-md-5">
        <input id="tgl_sk" type="date" class="form-control" name="start_date_surat_keluar" placeholder="Tanggal"
        value="{{ $request->start_date_surat_keluar }}" required>
    </div>
    <div class="col-md-5">
        <input id="tgl_sk" type="date" class="form-control" name="end_date_surat_keluar" placeholder="Tanggal"
        value="{{ $request->end_date_surat_keluar }}" required>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" id="filter">Filter</button>
    </div>
    </div>
</form>
<div class="row">


    <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
            {{ Session::get('message') }}</div>
        @endif
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title pull-left">Surat Masuk</h4>
                {{-- <a href="{{url('format_data')}}" class="btn btn-xs btn-info pull-right">Format data</a> --}}
                <div class="table-responsive">
                    <table class="table table-striped" id="table2">
                        <thead>
                            <tr>
                                <th>
                                    Nomor
                                </th>
                                <th>
                                    Nomor Surat
                                </th>
                                <th>
                                    Pengirim
                                </th>
                                <th>
                                    Perihal
                                </th>
                                <th>
                                    Tanggal Surat
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($surat_keluar as $key => $surat_keluars)
                            <tr>
                                <td class="py-1">
                                    <a href="{{route('surat_keluar.show', $surat_keluars->id)}}">
                                        {{$surat_keluars->id}}
                                    </a>
                                </td>
                                <td>
                                    {{$surat_keluars->no_suratsk}}
                                </td>
                                <td>
                                    {{$surat_keluars->pengirimsk}}
                                </td>
                                <td>
                                    {{$surat_keluars->perihalsk}}
                                </td>
                                <td>
                                    {{$surat_keluars->tgl_sk}}
                                </td>
                                <td>
                                    @if($disposisi[$key] == 2) 
                                    <a style="color:green;"> Terdisposisi </a>
                                    @elseif($disposisi[$key] == 1)
                                    <a style="color:blue;"> Menunggu </a>
                                    @else
                                   <a style="color:red;"> Belum Terdisposisi</a>
                                   @endif($disposisi[$key] == 0)
                                </td>
                                <td>
                                    @if(Auth::user()->level == 'admin')
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="{{route('surat_keluar.edit', $surat_keluars->id)}}"> Edit </a>
                                            <form action="{{ route('surat_keluar.destroy', $surat_keluars->id) }}" class="pull-left"
                                                method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    Delete
                                                </button>
                                                <a class="dropdown-item" href="{{route('surat_keluar.show', $surat_keluars->id)}}"> Detail </a>
                                                <div class="btn-group dropdown">
                                                    
                                                    
                                            </form>
                                            @elseif(Auth::user()->level == 'kepala bidang um')
                                            <a class="btn btn-info" href="{{route('surat_keluar.detail', ['id'=>$surat_keluars->id])}}">Lihat </a>
                                            @else
                                            <a class="btn btn-info" href="{{route('surat_keluar.detail', ['id'=>$surat_keluars->id])}}">Lihat </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--  {!! $surat_keluar->links() !!} --}}
            </div>
            
        </div>
    </div>
</div>
@endsection
