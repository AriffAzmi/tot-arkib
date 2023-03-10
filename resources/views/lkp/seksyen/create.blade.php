@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Seksyen</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('lkp-seksyen.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('error') }}
</div>
@endif
<form action="{{ route('lkp-seksyen.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Bahagian :</label>
                <select name="lkp_bahagian_id" id="" class="form-control">
                    @foreach ($lkp_bahagian as $bahagian)
                    <option value="{{ $bahagian->id }}">{{ $bahagian->keterangan }}</option>
                    @endforeach
                </select>
                @error('lkp_bahagian_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama Seksyen :</label>
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

