@extends('layouts.admin')
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
      <table id="example1" class="table table-striped table-bordered">
        <thead>
        <tr class="text-center">
          <th>No</th>
          <th>ID TRANSAKSI</th>
          <th>ID USER</th>
          <th>Name</th>
          <th>Jenis Aktivitas Yang Dilakukan</th>
          <th>Created</th>

        </tr>
        <tbody>
            @foreach ($data as $dt )
            <tr>

                <td><center>{{$loop->iteration}}</center></td>
                <td><center>{{$dt->id}}</center></td>
                <td><center>{{$dt->id_user}}</center></td>
                <td><center>{{$dt->tauser->nama}}</center></td>
                <td><center>{{$dt->log}}</center></td>
                <td><center>{{$dt->created_at}}</center></td>
            </center></td>
        </tr>
        @endforeach
        </tbody>

      </table>
      <a type="button" class="btn btn-danger float-right" href="{{ route('welcome') }}">Kembali</a>
    </div>
</div>
    <!-- /.card-body -->

    @endsection
