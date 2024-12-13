<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => 'required|max:50|email|exists:users,email',
            "password" => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (hash::check($request -> password, $user -> password)) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect('/');
            
        } else {
            
            return redirect()->back()->withErrors(['password' => 'Password is Invalid']);

        }
        
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function register()
    {
        return view('Auth.register');
    }
    
    public function register_proses(Request $r)
    {
        $r->validate([
            "name" => 'required|min:3|max:30',
            "email" => 'required|min:5|max:50|email|unique:users,email',
            "password" => 'required|confirmed|min:6'
        ]);

        $new = new User();
        $new -> name = $r -> name;
        $new -> email = $r -> email;
        $new -> password = Hash::make($r->password);
        $new -> level = 'user';
        $new -> save();
        
        return redirect('/register')->with('message', 'Register Success!!!');
    }

}