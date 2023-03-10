@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Pengguna</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('pengguna.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('error') }}
</div>
@endif
<form action="{{ route('pengguna.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama wajib diisi">
                @error('nama')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                <input type="text" name="email" class="form-control" placeholder="Email wajib diisi">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Peranan :</strong>
                <select name="peranan[]" id="" class="form-control" multiple>
                    @foreach ($permissions as $p)
                    <option value="{{ $p }}">{{ $p }}</option>
                    @endforeach
                </select>

                @error('peranan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Simpan</button>
    </div>
</form>
@endsection

