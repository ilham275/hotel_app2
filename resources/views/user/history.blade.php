@extends('layouts.app')
@section('content')
<script type="text/javascript">
    function total() {
    var harga_laptop = document.getElementById('harga_kamar').value;
    var harga_printer = document.getElementById('harga_fasilitas').value;
    var grand_total= harga_laptop + harga_printer + harga_harddisk;
    document.getElementById('harga_total').value = grand_total;
    }
</script>

<div class="container">
</br>
</br>
</br>
</br>
</br>
</br>
<div class="card">
    <div class="card-header">
    {{-- <a class="btn btn-success float-right" href="{{route('createkamar')}}">Tambah Data</a> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table datatable">
        <thead>
        <tr>
          <th>No</th>
          <th>ID USER</th>
          <th>NAMA KAMAR</th>
          <th>TYPE FASILITAS</th>
          <th>CEK IN</th>
          <th>CEK OUT</th>
          <th>STATUS</th>
          <th>HARGA KAMAR</th>
          <th>HARGA FASILITAS</th>
          <th>JUMLAH KAMAR</th>
          {{-- <th>Action</th> --}}
        </tr>
        </thead>
        @foreach ($data as $dt )
        <tbody>
        <td><center>{{$loop->iteration}}</center></td>
        <td><center>{{$dt->id_user}}</center></td>
        <td><center>{{$dt->taka->nama_kamar}}</center></td>
        <td><center>{{$dt->tafa->nama_fasilitas}}</center></td>
        <td><center>{{$dt->cek_in}}</center></td>
        <td><center>{{$dt->cek_out}}</center></td>
        <td><center>
            @if($dt->status == 1)
            <a class="text-red"> Booked</a>
            @elseif ($dt->status == 2)
            Sedang Pembayaran
            @elseif ($dt->status == 3)
            Full Booked
            @elseif ($dt->status == 4)
            Cek In
            @elseif ($dt->status == 5)
            Cek Out
            @endif
        </center></td>
        <td><center>@currency($dt->taka->harga_kamar)</center></td>
        <td><center>@currency($dt->tafa->harga_fasilitas)</center></td>
        <td><center>{{$dt->jumlah_kamar}}</center></td>
        <td>
        </td>
        </tbody>
        @endforeach
      </table>
      <a type="button" class="btn btn-danger float-right" href="{{ route('welcome') }}">Kembali</a>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
