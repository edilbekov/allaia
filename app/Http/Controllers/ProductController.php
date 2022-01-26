<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){        
        $categories=Category::select("name","id")->get();        
        return view("pages.products.add",['categories'=>$categories]);
    }
    public function add_product(Request $request){
        $images=$request->images;
        $img=[];
        foreach($images as $image){            
            $name=time().'-'.Str::random(32).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$name);
            $img[]=asset('images/'.$name);
        }        
        Product::create([
            'sub_category_id'=>$request->subcategory_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'descriptions'=>json_encode($request->descriptions),
            'sizes'=>json_encode(explode(', ',$request->sizes)),
            'colors'=>json_encode(explode(', ',$request->colors)),
            'images'=>json_encode($img)
        ]);
        return back();
    }
    public function list(){
        $products=Product::select("id","sub_category_id","name","price","discount_price","descriptions","sizes","colors")->get();        
        return view("pages.products.list",['products'=>$products]);
    }
    public function delete($id){
        Product::find($id)->delete();
        return redirect("list");
    }
    public function edit($id){
        $product=Product::select("name","price","discount_price","descriptions","sizes","colors")->where("id",$id)->get();
        return view('pages.products.edit',['product'=>$product,'id'=>$id]);
    }
    public function edited(Request $request,$id){
        Product::find($id)->update([
            "name"=>$request->name,
            "price"=>$request->price,
            "discount_price"=>$request->discount_price,
            'descriptions'=>json_encode($request->descriptions),
            'sizes'=>json_encode(explode(', ',$request->sizes)),
            'colors'=>json_encode(explode(', ',$request->colors))
        ]);
        return redirect("list");
    }
}
