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
      <div class="col-md-12">
        <div class="section-heading">
          <h2>
              <center>
                  Invoice
              </center>
            </h2>
        </div>
      </div>
      <center>
      <img src="{{asset('assets/images/barcode.png')}}" class="mb-4" alt="">
        <div class="table-responsive">
            <table class="table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>@currency($data->amount)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
    <a href="{{route('welcome')}}" class="btn btn-primary float-right">Kembali</a>
<!-- How to change your own map point
1. Go to Google Maps
2. Click on your location point
3. Click "Share" and choose "Embed map" tab
4. Copy only URL and paste it within the src="" field below
-->

      {{-- <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Kamar</th>
                                <th>Nomor Kamar</th>
                                <th>Type Kamar</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center table-primary">
                                <td>{{$data->lala->nama_kamar}}</td>
                                <td>{{$data->lala->no_kamar}}</td>
                                <td>{{$data->lala->type_kamar}}</td>
                                <td>@currency($data->lala->harga_kamar)</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary float-right">Pay</button>
                </div>
            </div>
    </div>
  </div> --}}
{{--
  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>About Single Room</h2>
        </div>
        </div>
        <div class="col-md-8">
          <div class="contact-form">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a> One small bed room with a super single KING KOIL BED size 120, it’s designed for solo traveler to enjoy their stay, with spacious room 12,5 sqm.<br>
                        <bold>General Facilities & Services:</bold> air-conditioned room, smoking room, 24 hour reception, restaurant, laundry service, room service (limited hours), hair dryer, luggage rack storage, car park, 24 hour security guard.
                    </a>
                </br>
                </br>
                <h2>Room Sevice:</h2>
                </br>
                <a>
                    ➤ Free Coffee and Tea
                </br>
                    ➤ Complimentary 1 bottle mineral water
                </br>
                    ➤ Daily Housekeeping
                </a>
                </div>
                <div class="row">



              </div>
          </div>
        </div>
        <div class="col-md-4">
          <ul class="accordion">
            <div class="card">

                <div class="content">
                    <h1>Fasilitas</h1>
                    <dl>
                    <dd>• Super single bed size 120 cm</dd>
                    <dd>• Smooking Room</dd>
                    <dd>• Free Coffee and Tea</dd>
                    <dd>• Water kettle</dd>
                    <dd>• Safety Box</dd>
                    <dd>• Telephone</dd>
                    <dd>• Refrigerator/dd>
                    <dd>• Smart LED TV</dd>
                    <dd>• Refrigerator</dd>
                    </dl>
                </div>


            </div>
          </ul>
        </div>
        <div class="col-md-12">
            <div class="section-heading">
          </div>
          </div>
          <div class="row">
      </div>
    </div> --}}
  </div>
@endsection
