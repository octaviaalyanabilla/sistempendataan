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
<form action="{{url('laporan/dataum')}}" class="col-lg-12">
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
        <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
    </div>
    </div>
</div>
</form>




<form action="{{url('laporan/datasurvei')}}" class="col-lg-12">
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
        <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
    </div>
    </div>
</form>


<form action="{{url('laporan/datakeluar')}}" class="col-lg-12">
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
        <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
    </div>
    </div>
</form>



    
@endsection
