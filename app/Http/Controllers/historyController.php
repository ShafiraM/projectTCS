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

class historyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)
                            ->where('status', '!=',0)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('History.history', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = pesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('History.detail', compact('pesanan', 'pesanan_detail'));
    }
}
