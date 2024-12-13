@extends('Main.main')
@section('title')
    Login
@endsection

@section('content')
    <style>
        .container{
            /* margin-top: 100px; */
            padding: 30px;
        }
        .signin {
            text-align: center; 
        }

        .signin a {
            color: royalblue;
        }

        .signin a:hover {
            text-decoration: underline royalblue;
        }

    </style>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-3">
                    <div class="card-header ">
                        <strong>SIGN IN TO YOUR EXISTING ACCOUNT</strong>
                    </div>
                    <div class="card-body">
        
                        <form action="{{url('/login')}}" method="post">
        
                            @csrf                 
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
                            
                            <!--Ini button untuk mengirim login-->
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                            <p>Don't have account? <a href="{{ url('/register') }}" class="text-decoration-none">Register Here!!</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection