@extends('layouts.admin')
@section('content')

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Nama Kamar</th>
          <th>Type Kamar</th>
          <th>Stock Kamar</th>
          <th>Harga Kamar</th>
          <th>Action</th>
          {{-- <th>Action</th> --}}
        </tr>
        </thead>
        @foreach ($data as $kmr )
        <tbody>
        <td><center>{{$loop->iteration}}</center></td>
        <td><center>{{$kmr->nama_kamar}}</center></td>
        <td><center>
        @if ($kmr->type_kamar == 1)
        President suite Room
        @elseif($kmr->type_kamar == 2)
        Deluxe Room
        @elseif($kmr->type_kamar == 3)
        Standart Room
        @endif
        </center></td>
        <td><center>{{$kmr->stok}}</center></td>
        <td><center>@currency($kmr->harga_kamar)</center></td>
        <td><center><a type="button" class="btn btn-warning" href="{{route('tkamar', $kmr->id)}}">Tambah Stok Kamar</a>
            <a type="button" class="btn btn-info" href="{{route('utkamar', $kmr->id)}}">Update Kamar</a></center></td>
        </tbody>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>



@endsection
