@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('surat_keluar.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Surat Masuk</h4>

                            <div class="form-group{{ $errors->has('judul_surat') ? ' has-error' : '' }}">
                                <label for="judul_surat" class="col-md-4 control-label">Judul</label>
                                <div class="col-md-6">
                                    <input id="judul_surat" type="text" class="form-control" name="judul_surat" placeholder="Judul" required>
                                    @if ($errors->has('judul_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul_surat') }}</strong>
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
                            <div class="form-group{{ $errors->has('tanggal_surat') ? ' has-error' : '' }}">
                                <label for="tanggal_surat" class="col-md-4 control-label">Tanggal Surat</label>
                                <div class="col-md-6">
                                    <input id="tanggal_surat" type="text" class="form-control" name="tanggal_surat" placeholder="Tanggal Surat" required>
                                    @if ($errors->has('tanggal_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_surat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('file_surat') ? ' has-error' : '' }}">
                                <label for="file_surat" class="col-md-4 control-label">File Surat</label>
                                <div class="col-md-6">
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="docpdf" placeholder="File Surat">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jenis_surat') ? ' has-error' : '' }}">
                                <label for="jenis_surat" class="col-md-4 control-label">Jenis Surat</label>
                                <div class="col-md-6">
                                <select class="form-control" name="jenis_surat" required="">
                                        <option value="">-- Jenis Surat --</option>
                                        <option value="online">Biasa</option>
                                        <option value="offline">Penting</option>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" id="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('surat_keluar.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection