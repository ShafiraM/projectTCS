@extends('Main.main')
@section('title')
    Add Category
@endsection
@section('content')

    <div class="container-fluid pt-3 mb-3">
        <h4 class="mb-0">Add Category</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="{{url('/')}}">Home</a> </li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="{{url('/category')}}">Category</a> </li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-3">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="w-100">
                                    <strong>Add</strong> Category
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif

                            <form action="" method="post">
                                @csrf
                              
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input value=" {{old('name')}}" type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type category name ..." autocomplete="off">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>

                                <!--Ini button untuk mengirim login-->
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right"></i> Process
                                </button>
                                <button type="reset" class="btn btn-light">
                                    Reset
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>

@endsection