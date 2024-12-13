@extends('Main.main')
@section('title')
    Katalog
@endsection

@section('content')
<!-- <div class="container text-center" >
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('images/3.png') }}" class="rounded mx-auto d-block" width="auto" alt="">
        </div> -->
        
<div class="container text-center" >
    <div class="row justify-content-center">
        @foreach($data as $product)
        <div class="col-md-3 md-4">
            <div class="card" object-fit: cover>
                <img src="{{ url('assets/produkImages/' . $product->photo) }}" class="card-img-top img-fluid" width="auto" height="auto" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <pc class="card-text"> 
                        <strong>Price:</strong> Rp. {{ number_format($product->price) }} <br>
                        <strong>Stok :</strong> {{$product->stok}} <br>
                        <hr>
                        <strong>keterangan :</strong> <br>
                        {{$product->keterangan}}
                    </p>
                    <a href="{{ url ('pesanan') }}/{{ $product->id }}" class="btn btn-primary"><i class="bi bi-cart"></i>Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- <h3>Katalog</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Etalase</li>
    </ol>
</nav>

<div class="row">
    @foreach($data as $product)
        <div class="col-md-4 mb-4"> 
            <div class="card h-100">
                <img src="{{ url('assets/produkImages/' . $product->photo) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Price: {{ $product->price }}</p>
                    <a href="{{ route('katalog.show', $product->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div> -->

@endsection

