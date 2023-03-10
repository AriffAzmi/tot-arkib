@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Senarai Seksyen</h2>
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

<a class="btn btn-success" href="{{ route('lkp-seksyen.create') }}">Tambah Seksyen</a>
<table class="table table-bordered">
    <tr>
        <th>Bil.</th>
        <th>Nama Seksyen</th>
        <th>Bahagian</th>
        <th>Status</th>
        <th width="280px">Tindakan</th>
    </tr>
    @foreach ($senarai_seksyen as $key => $seksyen)

    <tr>
        <td>{{ $key + 1 }}</td>
        <!-- <td>{{ $seksyen->id }}</td> -->
        <td>{{ $seksyen->keterangan }}</td>
        <td>{{ $seksyen->bahagian->keterangan }}</td>
        <td>
            @if($seksyen->status == 1)
                Aktif
            @else
                Tidak Aktif
            @endif
        </td>
        <td>
            <form action="{{ route('lkp-seksyen.destroy',$seksyen->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('lkp-seksyen.edit',$seksyen->id) }}">Kemaskini</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Padam</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $senarai_seksyen->links() !!}

@endsection
