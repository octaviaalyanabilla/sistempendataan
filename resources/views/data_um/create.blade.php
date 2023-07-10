@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>

<script type="text/javascript">
function readURL() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).prev().attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    $(".uploads").change(readURL)
    $("#f").submit(function() {
        // do ajax submit or just classic form submit
        //  alert("fake subminting")
        return false
    })
})
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('data_um.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Data UM</h4>

                            <div class="form-group{{ $errors->has('nama_data') ? ' has-error' : '' }}">
                                <label for="nama_data" class="col-md-4 control-label">Nama Pelaku Usaha</label>
                                <div class="col-md-6">
                                    <input id="nama_data" type="text" class="form-control" name="nama_data" placeholder="Nama Data UM" required>
                                    @if ($errors->has('nama_data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_data') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="nik" class="col-md-4 control-label">NIK</label>
                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control" name="nik" placeholder="NIK" required>
                                    @if ($errors->has('nama_data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nomor_kk') ? ' has-error' : '' }}">
                                <label for="nomor_kk" class="col-md-4 control-label">Nomor KK</label>
                                <div class="col-md-6">
                                <img class="product" width="200" height="200">
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="nomor_kk" placeholder="Nomor KK">
                                    </div>
                            </div>

                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                <label for="alamat" class="col-md-4 control-label">Alamat</label>
                                <div class="col-md-6">
                                    <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                                    @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bidang_usaha') ? ' has-error' : '' }}">
                                <label for="bidang_usaha" class="col-md-4 control-label">Bidang Usaha</label>
                                <div class="col-md-6">
                                    <input id="bidang_usaha" type="text" class="form-control" name="bidang_usaha" placeholder="Bidang Usaha" required>
                                    @if ($errors->has('bidang_usaha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bidang_usaha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('jenis_usaha') ? ' has-error' : '' }}">
                                <label for="jenis_usaha" class="col-md-4 control-label">Jenis Usaha</label>
                                <div class="col-md-6">
                                    <input id="jenis_usaha" type="text" class="form-control" name="jenis_usaha" placeholder="Jenis Usaha" required>
                                    @if ($errors->has('jenis_usaha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_usaha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
                                <label for="telepon" class="col-md-4 control-label">Telepon</label>
                                <div class="col-md-6">
                                    <input id="telepon" type="text" class="form-control" name="telepon" placeholder="Telepon" required>
                                    @if ($errors->has('telepon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telepon') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                                <label for="sku" class="col-md-4 control-label">SKU/NIB</label>
                                <div class="col-md-6">
                                    <input id="sku" type="text" class="form-control" name="sku" placeholder="SKU/NIB" required>
                                    @if ($errors->has('sku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('omset') ? ' has-error' : '' }}">
                                <label for="omset" class="col-md-4 control-label">Omset (pertahun)</label>
                                <div class="col-md-6">
                                    <input id="omset" type="text" class="form-control" name="omset" placeholder="Omset (pertahun)" required>
                                    @if ($errors->has('omset'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('omset') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('aset') ? ' has-error' : '' }}">
                                <label for="aset" class="col-md-4 control-label">Aset Usaha</label>
                                <div class="col-md-6">
                                    <input id="aset" type="text" class="form-control" name="aset" placeholder="Aset Usaha" required>
                                    @if ($errors->has('aset'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aset') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pemasaran') ? ' has-error' : '' }}">
                                <label for="pemasaran" class="col-md-4 control-label">Pemasaran</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="pemasaran" required="">
                                        <option value="">-- Pilih Pemasaran --</option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tk') ? ' has-error' : '' }}">
                                <label for="tk" class="col-md-4 control-label">Jumlah Tenaga Kerja</label>
                                <div class="col-md-6">
                                    <input id="tk" type="text" class="form-control" name="tk" placeholder="Jumlah Tenaga Kerja" required>
                                    @if ($errors->has('tk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('data_um.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection