@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Senarai Pengguna</h2>
        </div>
        <div class="pull-right">

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="">
            <div class="row">
                <div class="col-lg-8 margin-tb">
                    <div class="form-group">
                        <input type="text" name="carian" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 margin-tb">
                    <input type="submit" class="btn btn-primary" name="submit" value="Cari">
                </div>
            </div>
        </form>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<a class="btn btn-success" href="{{ route('pengguna.create') }}">Tambah Pengguna</a>
<table class="table table-bordered">
    <tr>
        <th>Bil.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Peranan</th>
        <th>Status</th>
        <th width="280px">Tindakan</th>
    </tr>
    @foreach ($senarai_pengguna as $key => $pengguna)

    <tr>
        <td>{{ $key + 1 }}</td>
        <!-- <td>{{ $pengguna->id }}</td> -->
        <td>{{ $pengguna->name }}</td>
        <td>{{ $pengguna->email }}</td>
        <td>
            @foreach ($pengguna->permissions as $p)
                {{ $p->name }},
            @endforeach
        </td>
        <td>
            @if($pengguna->status == 1)
                Aktif
            @else
                Tidak Aktif
            @endif
        </td>
        <td>
            <form action="{{ route('pengguna.destroy',$pengguna->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('pengguna.edit',$pengguna->id) }}">Kemaskini</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Padam</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $senarai_pengguna->links() !!}

@endsection
