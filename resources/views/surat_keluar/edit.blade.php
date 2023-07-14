@section('js')

<script type="text/javascript">
    $(document).ready(function () {
        $(".users").select2();
    });

</script>

<script type="text/javascript">
    function readURL() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).prev().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {
        $(".uploads").change(readURL)
        $("#f").submit(function () {
            // do ajax submit or just classic form submit
            //  alert("fake subminting")
            return false
        })
    })

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('surat_keluar.update', $surat_keluar->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data - <b>{{$surat_keluar->no_suratsk}}</b> </h4>
                            <form class="forms-sample">
                                <div class="form-group{{ $errors->has('no_suratsk') ? ' has-error' : '' }}">
                                    <label for="no_suratsk" class="col-md-4 control-label">Nomor Surat</label>
                                    <div class="col-md-6">
                                        <input id="no_suratsk" type="text" class="form-control" name="no_suratsk" placeholder="Masukkan Nomor Surat"
                                            value="{{ $surat_keluar->no_suratsk }}" required>
                                        @if ($errors->has('no_suratsk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_suratsk') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pengirimsk') ? ' has-error' : '' }}">
                                <label for="pengirimsk" class="col-md-4 control-label">Pengirim</label>
                                <div class="col-md-6">
                                    <input id="pengirimsk" type="text" class="form-control" name="pengirimsk" placeholder="Masukkan Pengirim" required>
                                    @if ($errors->has('pengirimsk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengirimsk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('perihalsk') ? ' has-error' : '' }}">
                                <label for="perihalsk" class="col-md-4 control-label">Perihal</label>
                                <div class="col-md-6">
                                    <input id="perihalsk" type="text" class="form-control" name="perihalsk" placeholder="Masukkan Perihal" required>
                                    @if ($errors->has('perihalsk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perihalsk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_sk') ? ' has-error' : '' }}">
                                <label for="tgl_sk" class="col-md-4 control-label">Tanggal Surat</label>
                                <div class="col-md-6">
                                    <input id="tgl_sk" type="date" class="form-control" name="tgl_sk" placeholder="Tanggal Surat Diterima"
                                        value="{{ old('tgl_sk') }}" required>
                                    @if ($errors->has('tgl_sk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_sk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('file_surat_keluar') ? ' has-error' : '' }}">
                                <label for="file_surat_keluar" class="col-md-4 control-label">File Surat</label>
                                <div class="col-md-6">
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="file_surat_keluar" placeholder="file_surat_keluar">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jenis_sk') ? ' has-error' : '' }}">
                                <label for="jenis_sk" class="col-md-4 control-label">Jenis Surat</label>
                                <div class="col-md-6">
                                <select class="form-control" name="jenis_sk" required="">
                                        <option value="">-- Jenis Surat --</option>
                                        <option value="biasa">Biasa</option>
                                        <option value="penting">Penting</option>
                                    </select>
                                </div>
                            </div>

                                <button type="submit" class="btn btn-primary" id="submit">
                                    Update
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
