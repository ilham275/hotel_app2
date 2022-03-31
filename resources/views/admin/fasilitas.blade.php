@extends('layouts.admin')
@section('content')

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
          <a href=""></a>
        <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Nama Fasilitas</th>
          <th>Harga Fasilitas</th>
          <th>Action</th>
          {{-- <th>Action</th> --}}
        </tr>
        </thead>
        @foreach ($data as $kmr )
        <tbody>
        <td><center>{{$loop->iteration}}</center></td>
        <td><center>{{$kmr->nama_fasilitas}}</center></td>
        <td><center>@currency($kmr->harga_fasilitas)</center></td>
        <td><center><a type="button" class="btn btn-success" href="{{route('tofasilitas', $kmr->id)}}">Tambah</a></center></td>
        </tbody>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>



@endsection
