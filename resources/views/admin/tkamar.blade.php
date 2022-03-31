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
          <form method="POST" action="{{route('pkamar', $data->id)}}"  enctype="multipart/form-data">
              @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="nama_kamar">Nama Kamar</label>
                <input type="text" class="form-control" id="nama_kamar" value="{{$data->nama_kamar}}" disabled>
              </div>
              <div class="form-group">
                <label for="type_kamar">Type Kamar</label>
                <input type="text" class="form-control" id="type_kamar" value="{{$data->type_kamar}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_kamar">Harga Kamar</label>
                <input type="text" class="form-control" id="harga_kamar" value="{{$data->harga_kamar}}" disabled>
              </div>
              <div class="form-group">
                <label for="stok">Jumlah Kamar</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{$data->stok}}">
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
