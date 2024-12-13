<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\Categoty;
use App\Models\pesanan;

class katalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $r)
    // {
    //     $data = produk::with('getSeller')->where('name','like',"%$r->search%")->get();
    //     return view('Katalog.katalog', compact('data'));
    // }

    public function index(Request $request)
{
    $search = $request->input('search');

    // Fetch products with optional search functionality
    $data = produk::with('getSeller')
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })
        ->get();
    

    return view('Katalog.katalog', compact('data'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
    }

    public function showDetails(string $id)
    {
        $iduser = Auth::user()->id;
        $kategori = categoty::where('user_id', $iduser)->get();
        $data = produk::findOrFail($id);
        return view('Katalog.detailsKatalog', compact('data')); 
    }

    
}

