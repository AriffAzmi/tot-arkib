@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Bahagian</h2>
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
<form action="{{ route('lkp-bahagian.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Bahagian :</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="Nama wajib diisi">
                @error('keterangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Simpan</button>
    </div>
</form>
@endsection

