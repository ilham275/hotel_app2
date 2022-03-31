@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
</br>
</br>
</br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>
              <center>
                  Pembayaran Kamar
              </center>
            </h2>
        </div>
      </div>
<!-- How to change your own map point
1. Go to Google Maps
2. Click on your location point
3. Click "Share" and choose "Embed map" tab
4. Copy only URL and paste it within the src="" field below
-->

      <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Kamar</th>
                                <th>Type Kamar</th>
                                <th>Jumlah Kamar</th>
                                <th>Total Hari</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>{{$data->taka->nama_kamar}}</td>
                                <td>{{$data->taka->type_kamar}}</td>
                                <td>{{$data->jumlah_kamar}}</td>
                                <td>{{$much}}</td>
                                <td>@currency($data->taka->harga_kamar)</td>
                                <td></td>
                            </tr>
                            <td>{{$data->tafa->nama_fasilitas}}</td>
                        </tbody>
                    </table>
                </div>
            </br>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Fasilitas Yang Ditambahkan</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>{{$data->tafa->nama_fasilitas}}</td>
                                <td>@currency($data->tafa->harga_fasilitas)</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <form method="POST" action="{{route('pembayaran')}}">
                        @csrf
                        <input id="id_transaksi" type="hidden" name="id_transaksi" value="{{$data->id}}">
                        <input id="id_user" type="hidden" name="id_user" value="{{$data->id_user}}">
                         <input id="amount" type="hidden" name="amount" value="{{ $total }}">
                        <input id="status" type="hidden" name="status" value="0">

                        <button type="submit" class="btn btn-primary float-right">Pay</button>
                    </form>
                </div>
            </div>
    </div>
  </div>

x
  </div>
@endsection
