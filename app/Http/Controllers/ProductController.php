<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:role_user');
    }
    public function index()
    {

        $product = Products::all();


        return view('product.index', compact('product'));
        // return view('product.index');
    }





    public function allproduct()
    {

        $product = Products::all();


        return view('product.allproduct', compact('product'));
    }




    public function create()
    {

        return view('product.create');
    }




    
    public function store(Request $request)
    {

        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'power' => 'required|string|max:100',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'img'   => 'required|file|mimes:jpg,jpeg,png|max:2048'
        ]);
        $path = $request->file('img')->store('image', 'public');

        $newProduct = Products::create([
            'name' => $data['name'],
            'power' => $data['power'],
            'brand' => $data['brand'],
            'price' => $data['price'],
            'img' => $path,

        ]);
        return redirect()->back()->with('success', 'successfully added');
    }

    public function edit($id){ 
        $product= Products::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Products::findOrFail($id);
         $data = $request->validate([
            'name'  => 'required|string|max:255',
            'power' => 'required|string|max:100',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'img'   => 'required|file|mimes:jpg,jpeg,png|max:2048']);

             $newProduct = [
            'name' => $data['name'],
            'power' => $data['power'],
            'brand' => $data['brand'],
            'price' => $data['price'],
           

        ];

        if($request->hasFile('img')){
            if($product->img){
                Storage::disk('public')->delete($product->img);
                
            }

            $newProduct['img']= $request->file('img')->store('image', 'public');
            
        }
        $product->update($newProduct);
        return redirect()->route('product.allproduct');

    }

    public function delete($id){
    
    $product=Products::findOrFail($id);
    $product->delete();
    return redirect()->back();
    }
}
