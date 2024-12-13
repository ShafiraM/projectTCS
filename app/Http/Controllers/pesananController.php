<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\pesanan;
use App\Models\pesananDetail;
use App\Models\Categoty;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class pesananController extends Controller
{
    
    public function index($id)
    {
        $data = produk::with('getSeller')->where('id', $id)->get();

        return view('Pesanan.pesanan', compact('data'));
    }

    public function Pesanan(Request $request, $id)
    {
        $request->validate([
            'jumlah_pesanan' => 'required|integer|min:1', // Pastikan jumlah_pesan ada dan merupakan integer positif
        ]);
        
        $data = produk::with('getSeller')->where('id', $id)->first();
        $tanggal = Carbon::now();

        if($request->jumlah_pesanan > $data->stok)
        {
            return redirect('pesanan/'.$id)->with('error', 'Jumlah pesanan melebihi stok yang tersedia.');
        }

        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        if (empty($cek_pesanan))
        {

            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100,999);
            $pesanan->save();
        } else {
            // Jika pesanan sudah ada, gunakan pesanan yang ada
            $pesanan = $cek_pesanan;
        }

        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $cek_pesanan_detail = pesananDetail::where('produk_id', $data->id)->where('pesanan_id',
            $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->produk_id = $data->id;
            $pesanan_detail -> name = $data -> name;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail -> price = $data -> price;
            $pesanan_detail->jumlah = $request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $data->price*$request->jumlah_pesanan;
            $pesanan_detail->save();
        }else {
            $pesanan_detail = pesananDetail::where('produk_id', $data->id)->where('pesanan_id',
            $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesanan;
           
            $harga_pesanan_detail_baru = $data->price*$request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }
        
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$data->price*$request->jumlah_pesanan;
        $pesanan->update();

        return redirect('check-out');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)
                            ->where('status', 0)
                            ->with('pesananDetail.produk')
                            ->first();
        
        if (!$pesanan) {
            // Handle the case when there's no active order
            return redirect('katalog')->with('error', 'Tidak ada pesanan aktif.');
        }
        
        $pesanan_detail = pesananDetail::with('produk')->where('pesanan_id', $pesanan->id)->get();
        $data = produk::all();

        $total_harga = $pesanan_detail->sum('jumlah_harga');
        $pesanan->jumlah_harga = $total_harga;
        $pesanan->save();
        

        return view ('pesanan.check_out', compact('pesanan', 'pesanan_detail', 'data'));
    }

    public function delete($id)
    {
        
        $pesanan_detail = pesananDetail::findOrFail($id);
        $pesanan = pesanan::findOrFail($pesanan_detail->pesanan_id);

        $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->save();
        
        $pesanan_detail-> delete();
        return redirect()->back()->with('message', 'Produk ' . $pesanan->name . 'berhasil dihapus');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->alamat)) 
        {
            return redirect('profile')->with('error', 'Identitas harap dilengkapi');
        
        }
        if (empty($user->nohp)) 
        {
            return redirect('profile')->with('error', 'Identitas harap dilengkapi');
        }
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_detail = pesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_detail as $pesanan_detail)
        {
            $data = produk::where('id', $pesanan_detail->produk_id)->first();
            $data->stok = $data->stok-$pesanan_detail->jumlah;
            $data->update();
        }
        return redirect('history/'.$pesanan_id)->with('message', 'Pesanan berhasil di check out silahkan lanjutkan pembayaran');
    }

    
    
}
// $data = produk::where('id', $id)->first();

// where('user_id', $idUser)->first();

// produk::all()->first;

// $data = produk::whereIn('id', $pesanan_detail->pluck('produk_name'))->get();

// $data = produk::with('getSeller')->whereIn('id', $pesanan_detail->pluck('produk_name'))->get();