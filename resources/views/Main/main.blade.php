<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">

        {{-- Link CDN --}}
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>
    <body>

        <style>
            .nav-link.active {
                background-color: #0062FF;
                /* Adjust to your desired active background color */
                color: white !important;
                /* Ensure the text color is visible */
                border-radius: 10px;
            }
            .bi-shop{
                font-size: 30px;
            }
        </style>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand px-5" style="margin-left: 35px">
                    <i class="bi bi-shop"></i>
                    <strong>DIMSUM MENTAI DIRA</strong>
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 30px">
                        <li class="nav-item">
                            <a
                                class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                                aria-current="page"
                                href="{{ url('/') }}">
                                <i class="bi bi-house"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link {{ Request::is('katalog') ? 'active' : '' }}"
                                aria-current="page"
                                href="{{ url('/katalog') }}">
                                <i class="bi bi-book"></i> </a>
                        </li>
                        
                        @auth
                            @if (Auth::user()->level=="admin")
                                <li class="nav-item">
                                    <a
                                        class="nav-link {{ Request::is('kategori') ? 'active' : '' }}"
                                        href="{{ url('/category') }}">
                                        Kategori
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link {{ Request::is('barang') ? 'active' : '' }}"
                                        href="{{ url('/barang') }}">
                                        Barang
                                    </a>
                                </li>
                            @endif
                        @endauth
                        @if (Auth::user())
                            <li class="nav-item dropdown">
                                <a
                                    id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                            Profile
                                    </a>    
                                    <a class="dropdown-item" href="{{ url('/history') }}">
                                            Riwayat Pesanan
                                    </a>    
                                    <a class="dropdown-item" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                    </a>
                                
                                    <form id="logout-form" action="{{ url('/logout') }}" method="GET"
                                        style="d-none"
                                        >@csrf
                                    </form>
                                </div>
                                </li>
                                <li class="nav-item">
                                <?php
                                $pesanan_utama = \App\Models\pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                $notif = 0; // Default value if no pesanan_utama is found
                                
                                if ($pesanan_utama) {
                                    $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                                }
                                ?>
                                <a 
                                    class="nav-link position-relative {{ Request::is('check-out') ? 'active' : '' }}" 
                                    aria-current="page" 
                                    href="{{ url('/check-out') }}">
                                    <i class="bi bi-cart"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $notif }}<span class="visually-hidden">Isi keranjang</span></span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ url('/login') }}"><i class="bi bi-person"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            @yield('content')
        </div>

        
        @include('Main.footer')

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>
</html>






                                   