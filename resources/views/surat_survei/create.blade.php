@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('surat_survei.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Surat Masuk</h4>

                            
                            <div class="form-group{{ $errors->has('no_surat') ? ' has-error' : '' }}">
                                <label for="no_surat" class="col-md-4 control-label">Nomor Surat</label>
                                <div class="col-md-6">
                                    <input id="no_surat" type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" required>
                                    @if ($errors->has('no_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_surat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pengirim') ? ' has-error' : '' }}">
                                <label for="pengirim" class="col-md-4 control-label">Pengirim</label>
                                <div class="col-md-6">
                                    <input id="pengirim" type="text" class="form-control" name="pengirim" placeholder="Pengirim" required>
                                    @if ($errors->has('pengirim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengirim') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('perihal') ? ' has-error' : '' }}">
                                <label for="perihal" class="col-md-4 control-label">Perihal</label>
                                <div class="col-md-6">
                                    <input id="perihal" type="text" class="form-control" name="perihal" placeholder="Perihal" required>
                                    @if ($errors->has('perihal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perihal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('file_surat') ? ' has-error' : '' }}">
                                <label for="file_surat" class="col-md-4 control-label">File Surat</label>
                                <div class="col-md-6">
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="file_surat" placeholder="File Surat">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_surat_asal') ? ' has-error' : '' }}">
                                <label for="tgl_surat_asal" class="col-md-4 control-label">Tanggal Surat</label>
                                <div class="col-md-6">
                                    <input id="tgl_surat_asal" type="date" class="form-control" name="tgl_surat_asal" placeholder="Tanggal Surat"
                                        value="{{ old('tgl_surat_asal') }}" required>
                                    @if ($errors->has('tgl_surat_asal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_surat_asal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_surat') ? ' has-error' : '' }}">
                                <label for="tgl_surat" class="col-md-4 control-label">Tanggal Surat Diterima</label>
                                <div class="col-md-6">
                                    <input id="tgl_surat" type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat Diterima"
                                        value="{{ old('tgl_surat') }}" required>
                                    @if ($errors->has('tgl_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_surat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jenis_surat') ? ' has-error' : '' }}">
                                <label for="jenis_surat" class="col-md-4 control-label">Jenis Surat</label>
                                <div class="col-md-6">
                                <select class="form-control" name="jenis_surat" required="">
                                        <option value="">-- Jenis Surat --</option>
                                        <option value="biasa">Biasa</option>
                                        <option value="penting">Penting</option>
                                    </select>
                                </div>
                            </div>
                            @if(Auth::user()->level == 'admin')
                            <button type="submit" class="btn btn-primary" id="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            @endif
                            <a href="{{route('surat_survei.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection