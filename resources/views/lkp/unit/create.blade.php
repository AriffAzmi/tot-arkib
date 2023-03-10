@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Unit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('lkp-unit.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('lkp-unit.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan :</strong>
                    <select class="form-control" name="lkp_bahagian_id" id="bahagian">
                        @foreach($senarai_bahagian as $bahagian)
                            <option value="{{ $bahagian->id }}">{{ $bahagian->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('lkp_bahagian_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan :</strong>
                    <select class="form-control" name="lkp_bahagian_id">
                        @foreach($senarai_unit as $unit)
                            @if($unit->lkp_bahagian_id == $bahagian->id)
                            <option value="{{ $unit->id }}">{{ $unit->keterangan }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('lkp_jabatan_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Unit :</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="Nama Unit">
                @error('keterangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <select id="select">
    <option value="">Select one</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select>
<br><br>
<input type="text" id="show_selected">
        <button type="submit" class="btn btn-primary ml-3">Simpan</button>
    </div>
</form>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(document).on('change', '#bahagian', function (e) {
    alert('masuk ajax')
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    type: 'GET',
    dataType: "json",
    url : 'lookup-bahagian',
    data : {id : $('#bahagian').val()},
    success:function(data){
        alert(data)
        console.log(data);

    },
});

});
</script>
