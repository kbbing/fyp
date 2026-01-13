<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Auth;
use Session;

class ProductController extends Controller
{
    function index(){
        $category = Category::all();
        $r=Product::all()->map(function ($product) {
            $productCategory = Category::find($product->category_id);
            $product->category_name = $productCategory ? $productCategory->name : 'Uncategorized';

            $productDetails = ProductDetail::where('product_id', $product->id)->get();
            $product->stock = $productDetails->sum('stock');
            $product->status = $product->stock >= 10 
                ? 'In Stock' 
                : ($product->stock > 0 ? 'Low Stock' : 'Out of Stock');
         
            return $product;
        });


        return view('admin.products.index') 
        ->with('product', $r);
    }

     function add(){
        return view('admin.products.add')
        ->with('category', DB::table('categories')->get())
        ->with('supplier', DB::table('supplier')->get());
    }

    function store(){
        $r=request();
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');
            $image->move('image',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
        }else{
            $imageName='empty.jpg';
        }
        $add=Product::create([
            'image'=> $imageName,
            'name' => $r->product_name,
            'price' => $r->price,
            'category_id'=>$r->category_id,
            'supplier_id'=>"1",
        ]);
        Session::flash('success', "New Item added");
        return redirect()->route('product.index');
    }

    function delete($id){
        $product=Product::find($id);
        $product->delete(); 
        Session::flash('success', "Product deleted");
        return redirect()->route('product.index');
    }

    function edit($id){
        $p=Product::find($id);
        if (!$p) {
            return redirect()->back()->with('error', 'Product not found');
        }
        return view('admin.products.edit')->with('product', $p)->with('category', DB::table('categories')->get());
    }

    function update(){
        $r=request();
        $product=Product::find($r->id);
        
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');
            $image->move('image',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $product->image=$imageName;
        }
        $product->name=$r->product_name;
        $product->price=$r->price;
        $product->category_id=$r->category_id;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function search(){
        $searchWord = request()->search;

        $searchProduct=DB::table('products')->where('name','LIKE','%' .$searchWord. '%')->get();
        
        return view ('showProduct')->with('product',$searchProduct);
    }
}
