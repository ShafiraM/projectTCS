<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        
        {{-- This is Bootstrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        {{-- This is Bootstrap Icon CDN --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <style>
            /* Style Footer */
            /* Custom styles for the footer */
            .header {
              background-color: #9E9E9E;
              color: #fff;
              padding: 30px 0;
            }
            .header a {
              color: #fff;
              text-decoration: none;
            }
            .footer a:hover {
              text-decoration: underline;
            }

            .text{
                color: #000;
            }
        </style>


        <nav class="fixed-top navbar navbar-expand-lg" style="background-color: #ffff">
            <div class="container-fluid">
                <a class="text navbar-brand ms-3" href="{{ url('/') }}" >DIMSUM MENTAI DIRA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Home -->
                        <li class="nav-item">
                            <a class="text nav-link" aria-current="page" href="{{ url('/') }}">
                            <i class="bi bi-house"></i>
                        </li>
                        <!-- Katalog -->
                        <li class="nav-item">
                            <a class="text nav-link" href="{{ url('/katalog') }}">
                            <i class="bi bi-book"></i>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item dropdown">
                                <a class="text nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                My Account
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/category') }}">Category</a></li>
                                    <li><a class="dropdown-item" href="#">Produk</a></li>
                                    <li><a class="dropdown-item me-5" href="{{ url('/logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <!-- * Style login&Register * -->
                            <li class="nav-item">
                                <a href="{{url('login')}}" class="text nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('register')}}" class="text nav-link">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


        <div class="mt-5">
            @yield('content')
        </div>


        {{-- Footer --}}
        <!-- <footer class="footer mt-auto py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" >
                        <h5>Informasi Kontak</h5>
                        <p>Alamat: Jalan Harapan Lr. kelapa Rt.36/RW.10, Kota Palembang</p>
                        <p>Email: diradimsummentai@gmail.com</p>
                        <p>Telepon: +62-85609327403</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Ikuti Kami</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://wa.me/085609327403">WhatsApp <i class="bi bi-whatsapp"></i></a></li>
                            <li><a href="https://www.instagram.com/dimsummentai_dira_palembang">Instagram <i class="bi bi-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2024 E-commerce. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer> -->
        
        @include('Main.footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>