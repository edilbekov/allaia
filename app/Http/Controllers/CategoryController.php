<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function welcome(){
        return view('pages.welcome');
    }
    public function categories(){
        $categories=Category::all('id','name'); 
        if(!$categories){
            return "Category was not created!";
        }       
        return view('pages.category.categories',['categories'=>$categories]);
    }
    public function add(){
        return view("pages.category.add");
    }
    public function add_category(Request $request){
        $name=$request->category;
        $category=Category::where('name',$name)->first();        
        if($category){
            return view('pages.category.add');
        }        
        Category::create([
            'name'=>$name
        ]);
        return redirect('categories');
    }
    public function delete($id){
        Category::find($id)->delete();
        return redirect("categories");
    }
    public function edit($id){
        return view("pages.category.edit",['id'=>$id]);
    }
    public function edit_category(Request $request){
        $id=$request->id;
        $edited_category=$request->edited_category;
        $exist=Category::where("name",$edited_category)->first();        
        if(!$exist){
            Category::find($id)->update(['name'=>$edited_category]);            
        }        
        return redirect("categories");
    }
}
