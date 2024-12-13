@extends('Main.main')
@section('title')
    Pesanan
@endsection

@section('content')
        
<div class="container" >
    <div class="row">
        @foreach($data as $product)
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ url('assets/produkImages/' . $product->photo) }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h3>{{ $product->name }}</h3>
                            <table class="table">
                                <tr>
                                    <td>Price</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($product->price) }} </td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>{{ number_format($product->stok) }} </td>
                                </tr>
                                <tr>
                                    <td>keterangan</td>
                                    <td>:</td>
                                    <td>{{ $product->keterangan }} </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pesanan</td>
                                    <td>:</td>
                                    <td>
                                        <form action="{{ url('pesanan') }}/{{ $product->id }}" method="post">
                                            @csrf
                                                
                                            <input type="text" name="jumlah_pesanan" class="form-control" required="">
                                            <a href="{{ url('katalog') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali </a>
                                            <!-- <a href="{{ url('/pesanan') }}" class="btn btn-primary"><i class="bi bi-cart"></i> Keranjang </a> -->
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart"></i> Keranjang </button>
                                        </form>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection



