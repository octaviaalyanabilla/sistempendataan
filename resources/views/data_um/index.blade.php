@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable({
            "iDisplayLength": 50
        });

    });

</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">


    <div class="col-lg-2">
        <a href="{{ route('data_um.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>
          Add Data UM</a>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        {{-- <form action="{{ url('import_data') }}" method="post" class="form-inline" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group {{ $errors->has('importdata') ? 'has-error' : '' }}">
            <input type="file" class="form-control" name="importdata" required="">

            <span class="input-group-btn">
                <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
            </span>
        </div>
        </form> --}}

    </div>
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
                {{-- <a href="{{url('format_data')}}" class="btn btn-xs btn-info pull-right">Format data</a> --}}
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
@endsection
