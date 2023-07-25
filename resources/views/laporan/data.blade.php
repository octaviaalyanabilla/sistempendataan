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

<div class="row" >
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data UM</h4>
                <form action="{{url('laporan/dataum')}}" >
                    <div class="row">
                        <div class="col-md-5">
                            <input id="tgl_sk" type="datetime-local" class="form-control" name="start_date_data_um" placeholder="Tanggal"
                            value="{{ $request->start_date_data_um }}" required>
                        </div>
                        <div class="col-md-5">
                            <input id="tgl_sk" type="datetime-local" class="form-control" name="end_date_data_um" placeholder="Tanggal"
                            value="{{ $request->end_date_data_um }}" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Surat Masuk</h4>
                <form action="{{url('laporan/datasurvei')}}" >
                    <div class="row">
                        <div class="col-md-5">
                        <input id="tgl_sk" type="date" class="form-control" name="start_date_surat_survei" placeholder="Tanggal"
                         value="{{ $request->start_date_surat_survei }}" required>
                        </div>
                        <div class="col-md-5">
                        <input id="tgl_sk" type="date" class="form-control" name="end_date_surat_survei" placeholder="Tanggal"
                            value="{{ $request->end_date_surat_survei }}" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Surat Keluar</h4>
                <form action="{{url('laporan/datakeluar')}}" >
                    <div class="row">
                        <div class="col-md-5">
                        <input id="tgl_sk" type="date" class="form-control" name="start_date_surat_keluar" placeholder="Tanggal"
                            value="{{ $request->start_date_surat_keluar }}" required>
                        </div>
                        <div class="col-md-5">
                        <input id="tgl_sk" type="date" class="form-control" name="start_date_surat_keluar" placeholder="Tanggal"
                            value="{{ $request->start_date_surat_keluar }}" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
