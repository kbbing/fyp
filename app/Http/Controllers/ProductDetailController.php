<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Report;
use Auth;
use Session;

class ProductDetailController extends Controller
{
    function index($id){
        $p=Product::find($id);

        $productDetails = ProductDetail::where('product_id', $id)->get();
        $p->stock = $productDetails->sum('stock');
        
        $productDetail = ProductDetail::all()->where('product_id', $p->id);
        if (!$productDetail) {
            return redirect()->back()->with('error', 'Product Detail not found');
        }
        
        return view('admin.productDetail.index')
        ->with('product', $p)
        ->with('productDetail', $productDetail);
    }

    public function add($id){
        $p=Product::find($id);
        return view('admin.productDetail.add')->with('product', $p);
    }

    function store(){
        $r=request();
        $add=ProductDetail::create([
            'sku'=> $r->sku,
            'status' => $r->status,
            'product_id' => $r->product_id,
            'stock_location' => 'Storage Room',
        ]);
        Session::flash('success', "New Item added");
        return redirect()->route('productDetail.index' , $r->product_id);
    }

    function rent($id){
        $r=request();

        $productDetail=ProductDetail::find($id);
        $productDetail->status = 3; // Set status to 'Rented Out'
        $productDetail->stock_location = $r->renter_name;
        $productDetail->save(); 

        $add=Report::create([
            'item' => $r->product_name,
            'sku' => $r->sku,
            'status' => '2',
            'person' => $r->renter_name,
        ]);

        Session::flash('success', "Product rented out");

        return redirect()->back();
    }

    function return($id){
        $productDetail=ProductDetail::find($id);
        $productDetail->stock_location = 'Storage Room';
        $productDetail->status = 1; // Set status to 'Available'
        $productDetail->save(); 

        $r=request();
        $add=Report::create([
            'item' => $r->product_name,
            'sku' => $r->sku,
            'status' => '1',
            'person' => $r->return_name,
        ]);

        Session::flash('success', "Product returned");
        return redirect()->back();
    }

    function edit($id){
        $r=request();
        $productDetail=ProductDetail::find($id);
        $productDetail->sku = $r->sku;
        $productDetail->status = $r->status;
        $productDetail->save(); 
        Session::flash('success', "Product Detail updated");

        return redirect()->back();
    }
}
