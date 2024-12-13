<?php

namespace App\Http\Controllers;

use App\Models\Categoty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class categoryController extends Controller
{
    public function index(){
        $data = Categoty::all();
        return view('Category.category', compact('data'));

    }

    public function add(){

        return view('Category.addCategory');

    }

    public function addProses(Request $r){

        $r->validate([
            "name" => 'required|min:3|max:50',
        ]);

        $new = new Categoty();
        $new -> user_id = Auth::user()->id;
        $new -> name = $r -> name;
        $new -> save();

        return redirect('/category')->with('message','Add Category Success!!!');
    }

    // public function edit($id){
    //     $data = Categoty::find($id);
    //     return view('Category.editCategory', compact('data'));

    // }

    // public function editProses(Request $r){

    //     $r->validate([
    //         "name" => 'required|min:3|max:50',
    //     ]);

    //     $new = new Categoty();
    //     $new -> user_id = Auth::user()->id;
    //     $new -> name = $r -> name;
    //     $new -> save();

    //     return redirect('/category')->with('message','Edit Category Success!!!');
    // }

    public function edit($id){
        $data = Categoty::find($id);
        return view('Category.editCategory', compact('data'));
    }
    
    public function editProses(Request $r, $id){ // Pass the category ID
    
        $r->validate([
            "name" => 'required|min:3|max:50',
        ]);
    
        // Find the existing category
        $category = Categoty::find($id);
    
        if ($category) {
            $category->name = $r->name; 
            $category->save(); // Update the existing category
    
            return redirect('/category')->with('message','Category Edited Successfully!');
        } else {
            return redirect('/category')->with('error','Category not found!');
        }
    }

    public function delete($id){

        $data = Categoty::findOrFail($id); //untuk mencari data sesusai $id yang dicari
        $data -> delete(); //function untuk hapus data
        return back()->with('message', 'Delete data success!!!');
    }
}
