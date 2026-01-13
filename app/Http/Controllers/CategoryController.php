<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use Auth;
use Session;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index')->with('category', Category::all());
    }

    public function add(){
        return view('admin.category.add');
    }

    public function store(Request $request){
        $r=request();

        $add=Category::create([
            'name' => $r->category_name,
        ]);
        Session::flash('success', "New Category added");

        return redirect()->route('category.index');
    }

    public function edit($id){
        $c=Category::find($id);
        return view('admin.category.edit')->with('category', $c);
    }

    public function update(){
        $r=request();
        $category = Category::find($r->id);
        $category->name = $r->category_name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', "Category deleted successfully"); 

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
