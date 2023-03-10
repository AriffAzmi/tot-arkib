@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kemaskini Pengguna</h2>
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
<form action="{{ route('pengguna.update',[$pengguna->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama wajib diisi" value="{{ $pengguna->name }}">
                @error('nama')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                <input type="text" name="email" class="form-control" placeholder="Email wajib diisi" value="{{ $pengguna->email }}">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password :</strong>
                <input type="text" name="password" class="form-control" placeholder="" value="">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status :</strong>
                <input type="radio"  id="option1" name="status" value="0"  {{ ($pengguna->status=="0")? "checked" : "" }} ><label>Tidak Aktif</label>
                <input type="radio" id="option2" name="status" value="1" {{ ($pengguna->status=="1")? "checked" : "" }} ><label>Aktif</label>
                @error('status')
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

