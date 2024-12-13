@extends('Main.main')
@section('title')
    Register
@endsection

@section('content')
    <style>
        .container{
            /* margin-top: 100px; */
            padding: 60px;
        }
    </style>

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-3">
                    <div class="card-header ">
                        <strong>CREATE ACCOUNT</strong>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div id="flash-message" class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            <script>
                                setTimeout(function(){
                                    document.querySelector('.alert').style.display = 'none';
                                }, 5000);
                            </script>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type full name ..." autocomplete="off">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @endif                            
                            </div>
    
                            <div class="mb-3">
                                <label for="email">E-mail</label>
                                <input value=" {{old('email')}}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type email ..." autocomplete="off">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @endif
                            </div>
    
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type password ...">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @endif
                            </div>
    
                            <div class="mb-3">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Type confirmation password ...">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @endif
                            </div>
    
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right"></i> Register
                            </button>
                            <button type="reset" class="btn btn-light">
                                Reset
                            </button>
                            
                            <p>Let's Shop!!! <a href="{{ url('/login') }}" class="text-decoration-none mt-5">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection