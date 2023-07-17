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

<form action="{{ route('surat_keluar.detail', $surat_keluar->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Data- <b>{{$surat_keluar->no_suratsk}}</b> </h4>
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
                                    <input id="pengirimsk" type="text" class="form-control" name="pengirimsk" placeholder="Pengirim" value="{{ $surat_keluar->pengirimsk }}" required>
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
                                    <input id="perihalsk" type="text" class="form-control" name="perihalsk" placeholder="Perihal" value="{{ $surat_keluar->perihalsk }}" required>
                                    @if ($errors->has('perihalsk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perihalsk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('file_surat_keluar') ? ' has-error' : '' }}">
                                <label for="file_surat_keluar" class="col-md-4 control-label">File Surat</label>
                                <div class="col-md-6">
                                <a href="{{url('document/surat/'.$surat_keluar->file_surat_keluar)}}" target="_blank">Lihat</a>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_sk') ? ' has-error' : '' }}">
                                <label for="tgl_sk" class="col-md-4 control-label">Tanggal Surat</label>
                                <div class="col-md-6">
                                    <input id="tgl_sk" type="date" class="form-control" name="tgl_sk" placeholder="Tanggal Surat"
                                    value="{{ $surat_keluar->tgl_sk }}" required>
                                    @if ($errors->has('tgl_sk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_sk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jenis_sk') ? ' has-error' : '' }}">
                                <label for="jenis_sk" class="col-md-4 control-label">Jenis Surat</label>
                                <div class="col-md-6">
                                    <input id="jenis_sk" type="text" class="form-control" name="jenis_sk" placeholder="Jenis Surat" value="{{ $surat_keluar->jenis_sk }}" required>
                                    @if ($errors->has('jenis_sk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_sk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                                <div class="form-group{{ $errors->has('disposisi_comment') ? ' has-error' : '' }}">
                                <label for="disposisi_comment" class="col-md-4 control-label">Masukkan Pesan Disposisi</label>
                                <div class="col-md-6">
                                    <input id="disposisi_comment" type="text" class="form-control" name="disposisi_comment" placeholder="Masukkan Pesan" required>
                                    @if ($errors->has('disposisi_comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disposisi_comment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fase') ? ' has-error' : '' }}">
                                <label for="fase" class="col-md-4 control-label">Ditujukan Ke</label>
                                <div class="col-md-6">
                                <select class="form-control" name="fase" required="">
                                        <option value="">-- Ditujukan Ke --</option>
                                        <option value="admin">Admin (Tim Pendataan)</option>
                                        <option value="kabid">Kepala Bidang UM</option>
                                        <option value="kadin">Kepala Dinas</option>
                                    </select>
                                </div>
                            </div>
                            <button type="Disposisi" class="btn btn-primary" id="disposisi">
                                Disposisi
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
