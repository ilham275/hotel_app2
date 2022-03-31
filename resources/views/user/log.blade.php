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
      <table id="example1" class="table table-striped table-bordered">
        <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Jenis Aktivitas Yang Dilakukan</th>
          <th>Created</th>

        </tr>
        @foreach ($data as $dt )
        <tbody>
        <td><center>{{$loop->iteration}}</center></td>
        <td><center>{{$dt->log}}</center></td>
        <td><center>{{$dt->created_at}}</center></td>
        </center></td>
        </tbody>
        @endforeach
      </table>
      <a type="button" class="btn btn-danger float-right" href="{{ route('welcome') }}">Kembali</a>
    </div>
    <!-- /.card-body -->
@endsection
