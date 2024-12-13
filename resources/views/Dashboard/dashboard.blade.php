@extends('Main.main')
@section('title')
    Dashboard
@endsection

@section('content')
<style>
    /* Custom styles for the slider */
    .carousel-inner img {
        width: 100%;
        /* Adjust the height as needed */
      object-fit: cover;
      margin-top: 20px;
    }

    .card-slider {
      overflow-x: auto;
      white-space: nowrap;
    }

    .card {
      display: inline-block;
      width: 200px; /* Adjust the width as needed */
      margin-right: 10px; /* Adjust the margin as needed */
    }

    
    /* Custom styles for the product card */
    .product-card {
      margin-bottom: 15px;
    }
    .product-card{
        width: 180px;
        height: 320px;
    }
    .bgMe{
        border-radius: 20px;
    }
  </style>


  {{-- Carousel --}}
    <div class="container mt-3">
        <div id="bannerCarousel" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="bgMe" src="{{ url('images/1.png') }}" class="d-block w-100" alt="Banner 1">
                    {{-- https://via.placeholder.com/1200x400 --}}
                </div>

                <!-- Add more carousel items here -->
            </div>
        </div>
    </div>

    {{-- Card Carousel --}}
    @if(isset($data) && $data->isNotEmpty())
        <div class="container p-5" >
            <div class="card-slider">
                @foreach($data as $product)
                    <div class="card">
                        <img src="{{ url('assets/produkImages/' . $product->photo) }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px">{{ $product->name }}</h5>
                            <p class="card-text" style="font-size: 12px;"><strong>Price:</strong> Rp. {{ number_format($product->price) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
     @else
        <p>No products available.</p>
    @endif

    <!-- {{-- Card Carousel --}}
    <div class="container p-5" >
        <div class="card-slider">
            @for ($i=1; $i<=5; $i++)
                <div class="card">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <img src="{{ url('images/test.png') }}" class="card-img-top" alt="Card Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Card {{ $i }}</h5>
                        <p class="card-text">This is a sample card.</p>
                    </div>
                </div>
            @endfor
        
        </div>
    </div> -->

    <!-- <div class="container">
        <div class="row">
            @for ($i = 0; $i <= 20; $i++)
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="card product-card">
                        <img src="{{ url('images/test.png') }}" class="card-img-top img-fluid" alt="Product Image">
                        <div class="card-body">
                        <h5 class="card-title">Nama Produk</h5>
                        <p class="card-text">Harga: Rp100.000</p>
                        <a href="#" class="btn btn-sm btn-primary">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            @endfor -->
            <!-- Add more product cards here -->
        <!-- </div>
    </div> -->

    <div class="row mb-3">
            <div class="col text-center">
                <a href="{{ url('/katalog') }}" class="btn btn-outline-secondary btn-sm">
                    Lihat semua Produk
                </a>
            </div>
    </div>
@endsection