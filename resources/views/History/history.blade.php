@extends('Main.main')
@section('title')
    History
@endsection

@section('content')
        
<div class="container" >
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="{{ url('katalog') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3><i class="bi bi-history"></i>Riwayat Pesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                         <tbody>
                            @forelse($pesanan as $index => $order)
                            <?php $no = 1; ?>
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $order->tanggal}}</td>
                                <td>
                                    @if($order->status == 1)
                                    Sudah Pesan & Belum dibayar
                                    @else
                                    Sudah dibayar
                                    @endif
                                </td>
                                <td>Rp {{ number_format($order->jumlah_harga+$order->kode)}}</td>
                                <td>
                                    <a href="{{ url('history', $order->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-info"></i>Detail</a>
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
              
        </div>
        
    </div>
</div>

@endsection