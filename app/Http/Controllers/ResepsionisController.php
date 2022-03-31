<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Transaksi;
use App\Models\Kamar;
use App\Models\Log;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    public function indexres()
    {
        if(auth()->user()->is_admin == 1)
        {
            return view('reservation.index');
        }
    }

    public function datares()
    {   $transaksi = Transaksi::all();
        if(auth()->user()->is_admin == 1)
        {
            return view('reservation.datareservation', compact('transaksi'));
        }
    }

    public function verif()
    {
        $pembayaran = Pembayaran::all();
        if(auth()->user()->is_admin == 1)
        {
            return view('reservation.verifikasi', compact('pembayaran'));
        }
    }

    public function verifa($id)
    {
        $data = pembayaran::find($id);
        $mytime = Carbon::now();
        ##LOG
        Log::create([
            'id_user' => $data->id_user,
            'log' => 'Pembayaran  Di terima Dengan ID Pembayaran : '.$data->id.' Pada Waktu : '. $mytime,
        ]);
        pembayaran::find($id)->update([
            'status' => 1
        ]);
        transaksi::where('id', '=', $id)->update([
            'status' => 3
        ]);
        return redirect()->route('verif');


    }

    public function log()
    {
        $data = log::all();
        return view('reservation.logall', compact('data'));
    }

    public function cek()
    {
        $data = Transaksi::where('status', '=', 3)->get();
        return view('reservation.cek', compact('data'));
    }

    public function cek_in($id)
    {
        $data = transaksi::find($id);
        transaksi::where('id', $id)->update([
            'status' => '4'
        ]);
        $mytime = Carbon::now();
        ##LOG

        Log::create([
            'id_user' => $data->id_user,
            'log' => 'Anda Melakukan Cek In Pada Waktu : '. $mytime,
        ]);

        return redirect()->route('cek');
    }

    public function tocekin()
    {
        $data = Transaksi::where('status', '=', 4)->get();
        return view('reservation.cekin', compact('data'));
    }

    public function cek_out($id)
    {
        $data = transaksi::find($id);
        $jumlah_kamar = $data->jumlah_kamar;
        $kamar_stok = $data->taka()->pluck('stok');
        $selesai = $kamar_stok[0] + $jumlah_kamar;
        transaksi::where('id', $id)->update([
            'status' => 5
        ]);

        kamar::where('id', '=', $data->id_kamar)->update([
            'stok' => $selesai
        ]);

        $mytime = Carbon::now();
        ##LOG

        Log::create([
            'id_user' => $data->id_user,
            'log' => 'Anda Melakukan Cek Out Pada Waktu : '. $mytime,
        ]);
        return redirect()->route('tocekin');
    }

    public function tocekout()
    {
        $data = Transaksi::where('status', '=', 5)->get();
        return view('reservation.cekout', compact('data'));
    }



}
