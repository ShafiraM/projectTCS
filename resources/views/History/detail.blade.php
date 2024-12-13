@extends('Main.main')
@section('title')
    Pesanan
@endsection

@section('content')
        
<div class="container" >
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan Anda sudah sukses di check out selanjutnya untuk pembayaran silahkan 
                    transfer di rekening <strong>Bank BCA Nomer Reknening :  1510-8152-00</strong>
                    dengan  nominal: <strong>Rp {{ 
                    number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    <h3><i class="bi bi-cart"></i>Detail Pesanan</h3>
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
                                    
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga:</strong></td>
                                <td align="right"><strong>Rp {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik:</strong></td>
                                <td align="right"><strong>Rp {{ number_format($pesanan->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Total yang harus di transfer:</strong></td>
                                <td align="right"><strong>Rp {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
           
        </div>
        
    </div>
</div>

@endsection