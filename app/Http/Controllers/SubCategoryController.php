<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function subcategories(){
        $categories=SubCategory::select("sub_categories.id","sub_categories.name as subcategory_name","categories.name as category_name")
        ->join("categories","categories.id","sub_categories.category_id")->get();

        if(!$categories){
            return "Category was not created!";
        }       
        return view('pages.subcategory.categories',['categories'=>$categories]);
    }
    public function add(){
        $categories=Category::all(['id','name']);
        return view("pages.subcategory.add",['categories'=>$categories]);
    }
    public function add_category(Request $request){
        $category_id=$request->category_id;
        $category_name=$request->category;
        $category=SubCategory::where('name',$category_name)->where('category_id',$category_id)->first();        
        if($category){
            return view('pages.subcategory.add');
        }
        else{
            SubCategory::create([
                'category_id'=>$category_id,
                'name'=>$category_name
            ]);
        }              
        return redirect('subcategories');
    }
    public function delete($id){
        SubCategory::find($id)->delete();
        return redirect("subcategories");
    }
    public function edit($id){
        return view("pages.subcategory.edit",['id'=>$id]);
    }
    public function edit_category(Request $request,$id){        
        $edited_category=$request->edited_category;
        $exist=SubCategory::where("name",$edited_category)->first();        
        if(!$exist){
            SubCategory::find($id)->update(['name'=>$edited_category]);            
        }        
        return redirect("subcategories");
    }
    public function subcategory($id){
        return SubCategory::select('id','name')->where('category_id',$id)->get();
    }
}
