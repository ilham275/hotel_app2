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
    @if (session('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>President Room</h2>
        </div>
      </div>
      <div class="col-md-8">
<!-- How to change your own map pointa
1. Go to Google Maps
2. Click on your location point
3. Click "Share" and choose "Embed map" tab
4. Copy only URL and paste it within the src="" field below
-->
    <div class="right-image">
        <img src="{{asset('assets/images/president.jpg')}}" alt="" height="500px" width="750px">
    </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-body">


              <form method="POST" action="{{route('totransaksi', $kamar->id)}}">
                @csrf
                    @method('PATCH')
                    @guest
                        <center>

                            <h10>@currency($kamar->harga_kamar)</h10>
                            </br>
                            <h8>Harga Permalam</h8>
                    </center>
              </br>

                    <label>Check In</label>
                                    <input id="cek_in" type="date" class="form-control @error('cek_in') is-invalid @enderror" name="cek_in" value="{{ old('cek_in') }}" required autocomplete="cek_in" autofocus disabled>
                        </br>
                        <label>Check Out</label>
                        <input id="cek_out" type="date" class="form-control @error('cek_out') is-invalid @enderror" name="cek_out" value="{{ old('cek_out') }}" required autocomplete="cek_out" autofocus disabled>
                    </br>
                    <label for="type_fasilitas">Fasilitas Kamar</label>
                    <select class="form-control" id="type_fasilitas" name="type_fasilitas" disabled>
                        @foreach ($fasilitas as $item)
                        <option value="{{$item->id}}"  {{old('type_fasilitas') == $item->nama_fasilitas ? "selected" : "" }}>{{$item->nama_fasilitas}}</option>
                        @endforeach
                    </select>
                    </br>
                    <label>Jumlah Kamar</label>
                    <input id="jumlah_kamar" type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}" placeholder="Akan Terdefault 1 jika tidak di isi" max="{{$count[0]}}" disabled>
                    </br>
                        @else

                        <center>
                        <h10>@currency($kamar->harga_kamar)</h10>
                    </br>
                    <h8>Harga Permalam</h8>
                </br>
            </center>

            <input id="id_user" type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <input id="id_kamar" type="hidden" name="id_kamar" value="{{ $kamar->id }}">
                        <label>Check In</label>
                            <input id="cek_in" type="date" class="form-control @error('cek_in') is-invalid @enderror" name="cek_in" value="{{ old('cek_in') }}" onchange="checkout()" required autocomplete="cek_in" min='<?= date('Y-m-d'); ?>' autofocus >
                </br>
                <label>Check Out</label>
                <input id="cek_out" type="date" class="form-control @error('cek_out') is-invalid @enderror" name="cek_out" value="{{ old('cek_out') }}" required autocomplete="cek_out" min='<?= date('Y-m-d', strtotime('+1 day')); ?>' autofocus>
              </br>
              <label for="type_fasilitas">Fasilitas Kamar</label>
              <select class="form-control" id="type_fasilitas" name="type_fasilitas">
                  @foreach ($fasilitas as $item)
                  <option value="{{$item->id}}"  {{old('type_fasilitas') == $item->nama_fasilitas ? "selected" : "" }}>{{$item->nama_fasilitas}}</option>
                  @endforeach
              </select>
              </br>
              <label>Jumlah Kamar</label>
              <input id="jumlah_kamar" type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}" placeholder="Akan Terdefault 1 jika tidak di isi" max="{{$count[0]}}" min="1">
            </br>
              <label>
                  <button type="submit" class="btn btn-primary">
                      {{ __('Procces') }}
                    </button>
                </label>
                        @endguest
                    </form>

                  @guest
                   <a type="submit" class="btn btn-primary" href="{{route('login')}}">Anda Harus Login</a>
                      @else
                    @endguest



            </div>
    </div>
          </div>
      </div>
    </div>
  </div>

  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
              <h6 class="float-right" style="color: rgb(107, 107, 107)">avaible room: {{$count[0]}}</h6>
            <h2>About President Room</h2>
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
                    <dd>• Refrigerator</dd>
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
    </div>
  </div>
  @endsection
  @section("script")
    <script>
        function checkout(){
        var checkin = new Date($('#cek_in').val());
        // console.log(checkin);
        var dd = checkin.getDate()+1;
        var mm = checkin.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = checkin.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
        mm='0'+mm

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("cek_out").setAttribute("min", today);
    }
}
    </script>
@endsection
