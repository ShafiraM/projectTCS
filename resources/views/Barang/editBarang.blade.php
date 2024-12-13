@extends('Main.main')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="container-fluid pt-3 mb-3">
        <h4>Edit Product</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
              <li class="breadcrumb-item"><a href="{{url('/barang')}}">Barang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Edit</strong> Product
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
                                <select name="kategori" id="kategori" 
                                    class="form-control @error('kategori') is-invalid @enderror">
                                        <option value="">Choose</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{$item->id}}" @if($item->id == $data->category_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input value="{{old('name',$data->name)}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type product name ...">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input value="{{old('keterangan',$data->keterangan)}}" type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Type product keterangan ...">
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input value="{{old('price',$data->price)}}" type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Type product price ...">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stok">Stok</label>
                                <input value="{{old('stok',$data->stok)}}" type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Type product stok ...">
                                @error('stok')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo">Photo</label>
                                <div class="mt-2 mb-3 w-50 align-items-center">
                                    <img src="{{url('assets/produkImages',$data->photo)}}" alt="" class="img-fluid">
                                </div>
                                <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="Choose product photo ...">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Update
                            </button>
                            <a href="{{ url('/barang') }}" class="btn btn-warning">Cancel</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection