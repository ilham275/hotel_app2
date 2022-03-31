<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\User;
use App\Models\Log;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Fasilitas;
use App\Models\Fasilitasu;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $standart = Kamar::where('type_kamar', '=', '3')->first();
        $exclusive = Kamar::where('type_kamar', '=', '2')->first();
        $president = Kamar::where('type_kamar', '=', '1')->first();
        if (!Auth::check())
        {
            return view('welcome', compact('standart', 'exclusive', 'president'));
        }
        else
        {

            if(Auth()->user()->is_admin == 2)
            {
                return redirect()->route('indexa');
            }
            elseif(Auth()->user()->is_admin == 1)
            {
                return redirect()->route('reservation');
            }
            else{
                return view('welcome', compact('standart', 'exclusive', 'president'));
            }
        }
    }

    public function history()
    {
        $data = transaksi::all();
        return view('user.history', compact('data'));
    }

    public function ketransaksi()
    {
        $data = transaksi::where('status', '=', '1')->where('id_user', '=', Auth()->user()->id)->get();
        return view('user.transaksi', compact('data'));
    }

    public function kepembayaran()
    {
        $data = pembayaran::where('id_user', '=', Auth()->user()->id)->get();
        return view('user.pembayaran', compact('data'));
    }

    public function tostandart($id)
    {
        $kamar = kamar::find($id);
        $fasilitas = fasilitas::all();
        $count = Kamar::where('type_kamar', '=', '3')->pluck('stok');
        return view('kamar.standart', compact('kamar', 'fasilitas', 'count'));
    }

    public function toexclusive($id)
    {
        $kamar = kamar::find($id);
        $fasilitas = fasilitas::all();
        $count = Kamar::where('type_kamar', '=', '2')->pluck('stok');
        return view('kamar.exclusive', compact('kamar', 'fasilitas', 'count'));
    }

    public function topresident($id)
    {
        $kamar = kamar::find($id);
        $fasilitas = fasilitas::all();
        $count = Kamar::where('type_kamar', '=', '1')->pluck('stok');
        return view('kamar.president', compact('kamar', 'fasilitas', 'count'));
    }

    public function totransaksi(Request $request, $id)
    {

            $kamar_stock = kamar::find($id)->pluck('stok');
            // dd($kamar);
            $id_user = $request->input('id_user');
            $id_kamar = $request->input('id_kamar');
            $type_fasilitas = $request->input('type_fasilitas');
            $cek_in = $request->input('cek_in');
            $cek_out = $request->input('cek_out');
            $jumlah_kamar = $request->input('jumlah_kamar');
            if($jumlah_kamar == null){
                $jumlah_kamar = 1;
            }
            $random = random_int(100, 999);
            // dd($jumlah_kamar);


        // $sa = $request->validate([
        //     'id_user'=> 'required',
        //     'id_kamar'=> 'required',
        //     'cek_in'=> 'required',
        //     'cek_out'=> 'required',
        // ]);



            $data = transaksi::create([
            'id_user' => $id_user,
            'id_kamar' => $id_kamar,
            'type_fasilitas' => $type_fasilitas,
            'status' => 1, ##BOOKED
            'cek_in' => $cek_in,
            'cek_out' => $cek_out,
            'jumlah_kamar' => $jumlah_kamar,
        ]);

            $juka = $kamar_stock[0] - $jumlah_kamar;
            // dd($juka);
            kamar::where('id', '=', $data->id_kamar)->update([
                'stok' => $juka
            ]);


            // dd($diti);
            // $total = $lala[0]  * $much * $juka + $lili[0] + $random;

            // dd($total);

            $mytime = Carbon::now();
            ##LOG
            Log::create([
                'id_user' => $id_user,
                'log' => 'Anda Sudah Melakukan Booked ID Transaksi : '.$data->id.' Pada Waktu : '. $mytime,
            ]);
            return redirect()->route('transaksi');
    }

    public function log()
    {
        $data = log::where('id_user', '=', Auth()->user()->id)->get();
        return view('user.log', compact('data'));
    }

    public function transaksi()
    {
        $data = Transaksi::where('id_user', '=', Auth()->user()->id)->latest('created_at')->first();
        $cekin = $data->cek_in;
        $cekout = $data->cek_out;
        $cek_in = carbon::parse($cekin);
        $cek_out = carbon::parse($cekout);
        $harga_kamar = $data->taka()->pluck('harga_kamar');
        $much = $cek_in->diffInDays($cek_out);
        $jumlah_kamar = $data->jumlah_kamar;
        $harga_fasilitas = $data->tafa()->pluck('harga_fasilitas');
        $random = random_int(100, 999);

        $total = $harga_kamar[0] * $much * $jumlah_kamar + $harga_fasilitas[0] + $random;


        return view('pembayaran.transaksi', compact('data', 'total', 'much'));
    }



    public function pembayaran(Request $request)
    {
            $id_transaksi = $request->input('id_transaksi');
            $id_user = $request->input('id_user');
            $amount = $request->input('amount');
            $status = $request->input('status');

            transaksi::where('id', '=', $id_transaksi)->update([
                'status' => 2
            ]);

            $data =  pembayaran::create([
                'id_transaksi' => $id_transaksi,
                'id_user' => $id_user,
                'amount' => $amount,
                'status' => $status,
            ]);

            $mytime = Carbon::now();
            ##LOG
            Log::create([
                'id_user' => $id_user,
                'log' => 'Anda Sedang Melakukan Tahap Pembayaran Dengan ID Pembayaran : '.$data->id.' Pada Waktu : '. $mytime,
            ]);

        return view('pembayaran.invoice', compact('data'));

    }

    public function detapembayaran($id)
    {
        $data = pembayaran::find($id);
            return view('user.detailpembayaran', compact('data'));
    }


    public function detailtransaksi($id)
    {
        $data = transaksi::find($id);
        $cekin = $data->cek_in;
        $cekout = $data->cek_out;
        $cek_in = carbon::parse($cekin);
        $cek_out = carbon::parse($cekout);
        $harga_kamar = $data->taka()->pluck('harga_kamar');
        $much = $cek_in->diffInDays($cek_out);
        $jumlah_kamar = $data->jumlah_kamar;
        $harga_fasilitas = $data->tafa()->pluck('harga_fasilitas');
        $random = random_int(100, 999);
        $total = $harga_kamar[0] * $much * $jumlah_kamar + $harga_fasilitas[0] + $random;

        return view('user.detailtransaksi', compact('data', 'total', 'much'));
    }

    public function detailpembayaran($id)
    {
        $data = pembayaran::find($id);
        return view('user.detailpembayaran', compact('data'));
    }





    ##ADMIN

    public function indexa()
    {
        $data = kamar::all();
        if(auth::user()->is_admin == 2)
        {
            return view('admin.index', compact('data'));
        }
    }

    public function tkamar($id)
    {
        $data = kamar::find($id);
        if(auth::user()->is_admin == 2)
        {
            return view('admin.tkamar', compact('data'));
        }
    }
    public function utkamar($id)
    {
        $data = kamar::find($id);
        if(auth::user()->is_admin == 2)
        {
            return view('admin.utkamar', compact('data'));
        }
    }

    public function pkamar(Request $request, $id)
    {
        // $request->validate([
        //     'nama_kamar'=>'required',
        //     'type_kamar'=>'required',
        //     'stok'=>'required',
        //     'harga_kamar'=>'required',
        // ]);
        // kamar::where('id', $id)->update([
        //     'nama_kamar' => $request->nama_kamar,
        //     'type_kamar' => $request->type_kamar,
        //     'stok' => $request->stok,
        //     'harga_kamar' => $request->harga_kamar
        // ]);
        // return redirect()->route('indexa');
        $kamars = kamar::find($id);
        $kamars->update($request->all());
        return redirect()->route('indexa');
    }

    public function upkamar(Request $request, $id)
    {
        $kamars = kamar::find($id);
        $kamars->update($request->all());
        return redirect()->route('indexa');

    }

    public function ifasilitas()
    {
        $data = fasilitas::where('id', '!=', '1')->get();
        if(auth::user()->is_admin == 2)
        {
            return view('admin.fasilitas', compact('data'));
        }
    }

    public function tofasilitas($id)
    {
        $data = fasilitas::find($id);
        if(auth::user()->is_admin == 2)
        {
            return view('admin.ufasilitas', compact('data'));
        }
    }

    public function upfasilitas(Request $request, $id)
    {
        $kamars = fasilitas::find($id);
        $kamars->update($request->all());
        return redirect()->route('ifasilitas');
    }

    public function umfasilitas()
    {
        $data = fasilitasu::all();
        if(auth::user()->is_admin == 2)
        {
            return view('admin.umum.index', compact('data'));
        }
    }

}
