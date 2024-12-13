@extends('Main.main')
@section('title')
    Profile
@endsection

@section('content')
<div class="contrainer">
    <div class="row">
        <div class="col-md-12 mt-4">
            <a href="{{ url('katalog') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div> 
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4><i class="bi bi-person"></i>My Profile</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td width="10">:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{ $user->nohp }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                <h4><i class="bi bi-pencil"></i>Edit Profile</h4>
                <form action="{{ url('profile') }}" method="post">
                    @csrf
                    <div class="mb-3 mt-4">
                        <label for="name">Name</label>
                        <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type full name ..." autocomplete="off">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endif                            
                    </div>
    
                    <div class="mb-3 mt-4">
                        <label for="email">E-mail</label>
                        <input value=" {{ $user->email }}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type email ..." autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="nohp">No. HP</label>
                        <input value="{{ $user->nohp }}" type="text" name="nohp" id="nohp" class="form-control @error('nohp') is-invalid @enderror" placeholder="Type full nohp ..." autocomplete="off">
                        @error('nohp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endif                            
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required="">{{$user->alamat}}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endif                            
                    </div>
    
                    <div class="mb-3 mt-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type password ...">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endif
                    </div>
    
                    <div class="mb-3 mt-4">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Type confirmation password ...">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endif
                    </div>
    
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right"></i> Save
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

@endsection