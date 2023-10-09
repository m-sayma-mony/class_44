<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function loadProductPage(){
        return view('frontend.product.product');
    }

    public function index(){
        $p = Product::all();
        return view('backend.product.index', ['products' => $p]);
    }

    public function create(){
        return view('backend.product.create');
    }

    public function store(Request $request){ 
       
        $request->validate([
            'title' => 'required | max:20',
            'price' => 'required | numeric | gt:0',
            'image' => 'image',
            'description' => 'max:50',
        ], [
            'title.required' => 'Please give a title',
            'title.max' => 'Title must be less than 10 character',
        ]);

        $product = new Product();
        $product->title         = $request->title;
        $product->description   = $request->description;
        $product->price         = $request->price;
        if($request->image){
            $imageName =  'product-image'.time().rand().'.'.$request->image->extension();
            $request->image->move('product-images/', $imageName);
            $product->image     = 'product-images/'.$imageName;
        }
        $product->save();


        // return to_route('create');
        return back()->with('Notifaction', 'Product Added Successfully');
        // return redirect('/');
        // return redirect(route('create'));
        // return redirect()->route('create');
        // return redirect()->back();
        // return 'Product added successfully';
    }

    public function edit(int $id){ 
        $product = Product::where('id', $id)->first();
        return view('backend.product.edit', ['product' => $product] );
    }

    public function update(Request $request, int $id){ 
        $request->validate([
            'title' => 'required | max:20',
            'price' => 'required | numeric | gt:0',
            'image' => 'image',
            'description' => 'max:50'
        ], [
            'title.required' => 'Please give a title',
            'title.max' => 'Title must be less than 10 character',
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->image){
            if(file_exists($product->image)){
                unlink($product->image);
            }
            $imageName =  'product-image'.time().rand().'.'.$request->image->extension();
            $request->image->move('product-images/', $imageName);
            $product->image     = 'product-images/'.$imageName;
        }

        $product->save();

        return to_route('products')->with('Notifaction', 'Product Updated Successfully');
        
    }

    public function destroy(int $id){ 
        $product = Product::find($id);
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        return back()->with('Notifaction', 'Product Deleted Successfully');
    }

    public function show(int $id){ 
        $product = Product::find($id);
        return view('frontend.product.detailse', ['product' => $product]);
    }
}
