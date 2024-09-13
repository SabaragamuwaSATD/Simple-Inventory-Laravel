<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request){
        // $incomingFields =  $request->validate([
        //     'name' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('products', 'public');
        // }

        // $incomingFields['name'] = strip_tags($incomingFields['name']);
        // $incomingFields['price'] = strip_tags($incomingFields['price']);
        // $incomingFields['description'] = strip_tags($incomingFields['description']);
        // $incomingFields['image'] = strip_tags($incomingFields['image']);
        // $incomingFields['user_id'] = auth()->id();
        // Product::create($incomingFields);
        // return redirect('/');

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
    
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $imagePath;
        $product->user_id = auth()->id();
        $product->save();
    
        return redirect('/')->with('success', 'Product created successfully!');
    
    }

    public function viewProduct(Product $product){
        return view('view-product', ['product' => $product]);
    }

    public function editProduct(Product $product){
        if(auth()->user()->id !== $product['user_id']){
            return redirect('/');
        }
        return view('edit-product', ['product' => $product]);
    }

    public function updatedProduct(Product $product, Request $request){
        if(auth()->user()->id !== $product['user_id']){
            return redirect('/');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $imagePath;
        $product->save();

        return redirect('/')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct(Product $product){
        if(auth()->user()->id === $product['user_id']){
            $product->delete();            
        }
        return redirect('/');
    }
}
