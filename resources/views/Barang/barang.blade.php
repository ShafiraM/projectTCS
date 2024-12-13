@extends('Main.main')
@section('title')
    Barang
@endsection
@section('content')
    <div class="container-fluid pt-3 mb-3">
        <h4 class="mb-0">Barang</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Barang</li>
            </ol>
        </nav>    
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="w-100 pt-1">
                        <strong>Data</strong> Barang
                    </div>
                    <div class="w-100 text-end">
                        <a href="{{ url('/barang/add') }}" class="btn btn-primary btn-sm"> 
                            <i class="bi bi-plus-circle"></i> Barang Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" id="flash-message">
                        {{Session::get('message')}}
                    </div>
                    <script>
                        setTimeout(function (){
                            document.getElementById('flash-message').style.display='none';
                        }, {{ session('timeout', 5000) }});
                    </script>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center" width="70">PHOTO</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    {{ (($data->currentPage() - 1) * $data->perPage()) + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <a href="{{url('assets/produkImages')}}/{{$item->photo}}" target="_blank"><img src="{{url('assets/produkImages')}}/{{$item->photo}}" class="img-fluid"></a>
                                </td>
                                <td>{{$item->name}} </td>
                                <td>{{$item->getKategori->name}} </td>
                                <td>Rp {{number_format($item->price)}} </td>
                                <td>{{$item->stok}}</td>
                                <td>{{$item->keterangan}}</td>
                                <td class="text-center">
                                    <a href="{{ url('/barang/edit') }}/{{ $item->id }}" title="Edit" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ url('/barang') }}/{{ $item->id }}" title="Hapus" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Yakin hapus data barang???');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>      
    </div>
@endsection