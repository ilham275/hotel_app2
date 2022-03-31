@extends('layouts.admin')
@section('content')

    <!-- /.card-header -->

      <!-- /.row -->
    <!-- /.card-body -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>NO</th>
          <th>Nama</th>
          <th>Nama Kamar</th>
          <th>Jumlah Kamar</th>
          <th>Status</th>
          <th>Cek In Transaksi</th>
          <th>Cek Out Transaksi</th>
          {{-- <th>Action</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $kmr )
            <tr>
            <td><center>{{$loop->iteration}}</center></td>
            <td><center>{{$kmr->taus->nama}}</center></td>
            <td><center>{{$kmr->taka->nama_kamar}}</center></td>
            <td><center>{{$kmr->jumlah_kamar}}</center></td>
            <td><center>
            @if($kmr->status == 5)
            Sudah Cek Out
            @endif
            </center></td>
            <td><center>{{$kmr->cek_in}}</center></td>
            <td><center>{{$kmr->cek_out}}</center></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>



@endsection
