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

</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">