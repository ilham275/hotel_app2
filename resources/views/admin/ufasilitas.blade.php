@extends('layouts.admin')
@section('content')


<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Stock Kamar</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{route('upfasilitas', $data->id)}}"  enctype="multipart/form-data">
              @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="nama_fasilitas">Nama Fasilitas</label>
                <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas" value="{{$data->nama_fasilitas}}">
              </div>
              <div class="form-group">
                <label for="harga_fasilitas">Harga Fasilitas</label>
                <input type="text" class="form-control" id="harga_fasilitas" name="harga_fasilitas" value="{{$data->harga_fasilitas}}">
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">
                    {{ __('Submit') }}
                  </button>
                </div>
            </form>
            <a type="submit" href="{{route('indexa')}}" class="btn btn-danger">Kembali</a>
    </div>
      </div>
    </div>


@endsection
