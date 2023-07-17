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

<form action="{{ route('surat_survei.detail', $surat_survei->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Data- <b>{{$surat_survei->no_surat}}</b> </h4>
                            <form class="forms-sample">
                                <div class="form-group{{ $errors->has('no_surat') ? ' has-error' : '' }}">
                                    <label for="no_surat" class="col-md-4 control-label">Nomor Surat</label>
                                    <div class="col-md-6">
                                        <input id="no_surat" type="text" class="form-control" name="no_surat" placeholder="Masukkan Nomor Surat"
                                            value="{{ $surat_survei->no_surat }}" required>
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
                                    <input id="pengirim" type="text" class="form-control" name="pengirim" placeholder="Pengirim" value="{{ $surat_survei->pengirim }}" required>
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
                                    <input id="perihal" type="text" class="form-control" name="perihal" placeholder="Perihal" value="{{ $surat_survei->perihal }}" required>
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
                                <a href="{{url('document/surat/'.$surat_survei->file_surat)}}" target="_blank">Lihat</a>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_surat_asal') ? ' has-error' : '' }}">
                                <label for="tgl_surat_asal" class="col-md-4 control-label">Tanggal Surat</label>
                                <div class="col-md-6">
                                    <input id="tgl_surat_asal" type="date" class="form-control" name="tgl_surat_asal" placeholder="Tanggal Surat"
                                    value="{{ $surat_survei->tgl_surat_asal }}" required>
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
                                    value="{{ $surat_survei->tgl_surat }}" required>
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
                                    <input id="jenis_surat" type="text" class="form-control" name="jenis_surat" placeholder="Jenis Surat" value="{{ $surat_survei->jenis_surat }}" required>
                                    @if ($errors->has('jenis_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_surat') }}</strong>
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

                            

                                <a href="{{route('surat_survei.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
