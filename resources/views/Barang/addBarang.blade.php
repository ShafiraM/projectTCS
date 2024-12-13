@extends('Main.main')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="container-fluid pt-3 mb-3">
        <h4>Add Product</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
              <li class="breadcrumb-item"><a href="{{url('/barang')}}">Barang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Add</strong> Product
                </div>
                <div class="card-body">
                    @if(Session::has('msg'))
                        <div class="card alert alert-success">
                            {{Session::get('msg')}}
                        </div>
                    @endif
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">                                
                                <label for="kategori">Choose Category</label>
                                <select name="kategori" id="kategori" class="form-control
                                @error('kategori') is-invalid @enderror">
                                    <option value="">Choose</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                                @error ('kategori')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type product name ..." autocomplete="off">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input value="{{old('keterangan')}}" type="text" name="keterangan" id="keterangan" class="form-control @error('keternagan') is-invalid @enderror" placeholder="Type product keterangan ..." autocomplete="off">
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input value="{{old('price')}}" type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Type product Price ..." autocomplete="off">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stok">Stok</label> 
                                <input value="{{old('stok')}}" type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Type product stok ..." autocomplete="off">
                                @error('stok')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo">Photo</label>
                                <input value="{{old('photo')}}" type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="Type product Photo ...">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Process
                            </button>
                            <button type="reset" class="btn btn-light">
                                Reset
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection