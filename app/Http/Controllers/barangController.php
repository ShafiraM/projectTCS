<?php

namespace App\Http\Controllers;

use App\Models\Categoty;
use App\Models\produk;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $idUser = Auth::user()->id;
        $data = produk::with('getKategori')->where('user_id', $idUser)->paginate(10);
        return view('Barang.barang', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $kategori = categoty::where('user_id', $iduser)->get();
        return view('Barang.addBarang', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'kategori' => 'required|exists:categoties,id',
            'name' => 'required|min:3|max:50',
            'price' => 'required|integer',
            'photo' => 'required|mimes:png,jpg,jpeg',
            'stok' => 'required|integer',
            'keterangan' => 'nullable'
        ]);
                
        $photo = $req -> file('photo');
        $new_photo_name = uniqid().".".$photo->getClientOriginalExtension();
        $photo -> move('assets/produkImages', $new_photo_name);

        $new = new produk();
        $new -> user_id = Auth::user()->id;
        $new -> category_id  = $req -> kategori;
        $new -> name = $req -> name;
        $new -> price = $req -> price;
        $new -> photo = $new_photo_name;
        $new -> stok = $req -> stok;
        $new -> keterangan =$req -> keterangan;
        $new -> save();

        return redirect('/barang')->with('message', 'Produk ' .$req->name. ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iduser = Auth::user()->id;
        $kategori = categoty::where('user_id', $iduser)->get();
        $data = produk::find($id);
        return view('Barang.editBarang', compact('kategori', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $req->validate([
            'kategori' => 'required|exists:categoties,id',
            'name' => 'required|min:3|max:50',
            'price' => 'required|integer',
            'photo' => 'mimes:png,jpg,jpeg',
            'stok' => 'required|integer',
            'keterangan' => 'nullable'
        ]);
    
        $new = Produk::find($id);
        $new->user_id = Auth::user()->id;
        $new->category_id = $req->kategori;
        $new->name = $req->name;
        $new->price = $req->price;
        $new->stok = $req->stok;
        $new->keterangan = $req->keterangan;
    
        // Simpan nama file foto lama
        $old_photo = $new->photo;
    
        if ($req->file('photo')) {
            $photo = $req->file('photo');
            $new_photo_name = uniqid().".".$photo->getClientOriginalExtension();
            $photo->move('assets/produkImages', $new_photo_name);
    
            // Set foto baru ke model
            $new->photo = $new_photo_name;
    
            // Hapus foto lama jika ada
            if ($old_photo && file_exists(public_path('assets/produkImages/' . $old_photo))) {
                unlink(public_path('assets/produkImages/' . $old_photo));
            }
        }
    
        $new->save();
    
        return redirect('/barang')->with('message', 'Produk ' . $req->name . ' berhasil diperbaharui');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Produk::findOrFail($id);

        // Cek apakah produk memiliki foto
        if ($data->photo && file_exists(public_path('assets/produkImages/' . $data->photo))) {
            // Hapus foto dari folder
            unlink(public_path('assets/produkImages/' . $data->photo));
        }

        // Hapus data produk dari database
        $data->delete();

        return redirect()->back()->with('message', 'Produk ' . $data->name . ' berhasil dihapus');
    }

}