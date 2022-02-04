<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function single_page($id){
        $products=Product::all()->where("id",$id);
        $categories=Category::select('name')->get();        
        return view('user.single_page',['products'=>$products,'categories'=>$categories]);
    }
}
