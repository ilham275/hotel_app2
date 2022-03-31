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
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama Kamar</th>
          <th>Tanggal Check In</th>
          <th>Tanggal Check Out</th>
          <th>Tanggal Booked</th>
          <th>Status</th>
          {{-- <th>Action</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $kmr )
            <tr>
        <td><center>{{$loop->iteration}}</center></td>
        <td><center>{{$kmr->taus->nama}}</center></td>
        <td><center>{{$kmr->taka->nama_kamar}}</center></td>
        <td><center>{{$kmr->cek_in}}</center></td>
        <td><center>{{$kmr->cek_out}}</center></td>
        <td><center>{{$kmr->created_at}}</center></td>
        <td>
            <center>
            @if ($kmr->status == 1)
            Booked
            @elseif ($kmr->status == 2)
            Sedang Dalam Pembayaran
            @elseif ($kmr->status == 3)
            Full Booked
            @elseif ($kmr->status == 4)
           Cek In
            @elseif ($kmr->status == 5)
            Cek Out
            @endif</center></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>



@endsection
