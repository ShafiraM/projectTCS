@extends('Main.main')
@section('title')
    Category
@endsection

@section('content')
    <div class="container-fluid pt-3 mb-3">
        <h4 class="mb-0">Category</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Category
                </li>
            </ol>
        </nav>
  
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="w-100 pt-1">
                        <strong>Data</strong> Category
                    </div>
                    <div class="w-100 text-end">
                        <a href="{{ url('/add/category') }}" class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Add New Category </a>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" id="flash-message">
                         {{Session::get('message')}}
                     </div>
                     <script>
                        setTimeout(function(){
                            document.getElementById('flash-message').style.display='none';
                        }, {{ session('timeout', 5000) }});
                    </script>
                 @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>NAME</th>
                            <th width="200">ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{ url('/edit/category') }}/{{ $item->id }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="{{ url('/del/category') }}/{{ $item->id }}" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are You Sure ???');">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection