@extends('layouts.app')

@section('content')

<div class="container">
</br>
</br>
</br>
</br>
</br>
</br>
<div class="card">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>ID TRANSAKSI</th>
          <th>TOTAL PEMBAYARAN</th>
          <th>STATUS PEMBAYARAN</th>
          <th>DETAIL</th>

        </tr>
        @foreach ($data as $dt )
        <tbody>
        <td><center>{{$loop->iteration}}</center></td>
        <td><center>{{$dt->id_transaksi}}</center></td>
        <td><center>@currency($dt->amount)</center></td>
        <td><center>
        @if($dt->status == 1)
        Pembayaran Selesai
        @else
        Belum Pembayaran
        @endif

        </center></td>
        <td><center>            <a type="button" class="btn btn-warning" href="{{route('detapembayaran', $dt->id)}}">Detail</a>        </center></td>
        </tbody>
        @endforeach
      </table>
      <a type="button" class="btn btn-danger float-right" href="{{ route('welcome') }}">Kembali</a>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
