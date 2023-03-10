@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kemaskini Bahagian</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('lkp-bahagian.index') }}">Kembali</a>
        </div>
    </div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('lkp-bahagian.update',$lkp_bahagian->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Bahagian :</strong>
                <input type="text" name="keterangan" value="{{ $lkp_bahagian->keterangan }}" class="form-control"
                    placeholder="Nama Bahagian">
                @error('keterangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status :</strong>
                <input type="radio"  id="option1" name="status" value="0"  {{ ($lkp_bahagian->status=="0")? "checked" : "" }} ><label>Tidak Aktif</label>
                <input type="radio" id="option2" name="status" value="1" {{ ($lkp_bahagian->status=="1")? "checked" : "" }} ><label>Aktif</label>
                @error('status')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Kemaskini</button>
    </div>
</form>
@endsection
