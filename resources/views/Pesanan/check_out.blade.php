@extends('Main.main')
@section('title')
    Pesanan
@endsection

@section('content')
        
<div class="container" >
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="{{ url('katalog') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3><i class="bi bi-cart"></i>Check Out</h3>
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_detail as $index => $detail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($detail->Produk && $detail->produk->photo)
                                            <img src="{{ asset('assets/produkImages/' . $detail->produk->photo) }}" width="100" alt="Product Image">
                                        @else
                                            <span>No image available</span>
                                        @endif
                                    </td>
                                    <td>{{ $detail->name}}</td> 
                                    <td>{{ $detail->jumlah }} pcs</td>
                                    <td align="left">Rp {{ number_format ($detail->price) }}</td> 
                                    <td align="left">Rp {{ number_format ($detail->jumlah_harga) }}</td> 
                                    <td class="text-center">
                                    <form align="left" action="{{ url('/check-out', $detail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Apakah anda yakin untuk menghapus data barang?');">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Pembelian:</strong></td>
                                <td><strong>Rp {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success"
                                    onclick="return confirm('Apakah anda sudah yakin untuk check out barang?');">
                                        <i class="bi bi-cart"></i>Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
           
        </div>
        
    </div>
</div>

@endsection


                            
