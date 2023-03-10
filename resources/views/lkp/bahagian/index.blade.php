@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Senarai Bahagian</h2>
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

@can("Tambah Bahagian")
<a class="btn btn-success" href="{{ route('lkp-bahagian.create') }}">Tambah Bahagian</a>
@endcan
<table class="table table-bordered">
    <tr>
        <th>Bil.</th>
        <th>Nama Bahagian</th>
        <th>Status</th>
        <th width="280px">Tindakan</th>
    </tr>
    @foreach ($senarai_bahagian as $key => $bahagian)

    <tr>
        <td>{{ $key + 1 }}</td>
        <!-- <td>{{ $bahagian->id }}</td> -->
        <td>{{ $bahagian->keterangan }}</td>
        <td>
            @if($bahagian->status == 1)
                Aktif
            @else
                Tidak Aktif
            @endif
        </td>
        <td>
            <form action="{{ route('lkp-bahagian.destroy',$bahagian->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('lkp-bahagian.edit',$bahagian->id) }}">Kemaskini</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Padam</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $senarai_bahagian->links() !!}

@endsection
