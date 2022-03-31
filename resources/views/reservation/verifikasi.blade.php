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
          <th>ID Transaksi</th>
          <th>NAMA</th>
          <th>Status</th>
          <th>Total</th>
          <th>Tanggal Transaksi</th>
          <th>Action</th>
          {{-- <th>Action</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $kmr )
            <tr>
            <td><center>{{$kmr->id}}</center></td>
            <td><center>{{$kmr->peus->nama}}</center></td>
            <td><center>
            @if ($kmr->status == 0)
                Belum Melakukan Pembayaran
            @else
                Sudah Melakukan Pembayaran
            @endif
            </center></td>
            <td><center>@currency($kmr->amount)</center></td>
            <td><center>{{$kmr->created_at}}</center></td>
            <td>
                @if ($kmr->status == 1)
                <center>Sudah Melakukan Pembayaran</center>
                @else
                <center><a type="button" class="btn btn-success" href="{{ route('verifa', $kmr->id) }}">Terima Pembayaran</a></center>
                @endif
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>



@endsection
