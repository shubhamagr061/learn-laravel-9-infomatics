<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    

    public function index(){
        $products = Product::orderBy('id')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        Product::create($request->post());

        return redirect()->route('products')->with('success','Product has been created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        
        $product->fill($request->post())->save();

        return redirect()->route('product')->with('success','Product Has Been updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products')->with('success','Product has been deleted successfully');
    }
}
