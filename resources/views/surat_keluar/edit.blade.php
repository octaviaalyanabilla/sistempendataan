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
                            <h4 class="card-title">Edit Data - <b>{{$surat_keluar->judul_surat}}</b> </h4>
                            <form class="forms-sample">
                                <div class="form-group{{ $errors->has('judul_surat') ? ' has-error' : '' }}">
                                    <label for="judul" class="col-md-4 control-label">Judul</label>
                                    <div class="col-md-6">
                                        <input id="judul_surat" type="text" class="form-control" name="judul_surat" placeholder="Judul"
                                            value="{{ $surat_keluar->judul_surat }}" required>
                                        @if ($errors->has('judul_surat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('judul_surat') }}</strong>
                                        </span>
                                        @endif
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
