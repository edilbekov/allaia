<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome(){
        $categories=Category::select('id','name')->get();
        $products=Product::select('id','name','price','discount_price','images','all_view')
        ->orderBy('id','desc')
        ->limit(8)
        ->get();  
        $all_view=Product::select('all_view','name','images','discount_price')->orderBy('all_view','desc')->limit(4)->get();        
        return view('user.main',['categories'=>$categories,'products'=>$products,'all_view'=>$all_view]);
    }
    public function auth(){
        $categories=Category::select('id','name')->get();
        return view('user.auth',['categories'=>$categories]);
    }
    public function registration(Request $request){
        $data=$request->validate([
            'email'=>'unique:users,email',
            'password'=>[
                'password'
            ]
        ]);

        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
                
        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);
        return "Success";
    }
    public function login(Request $request){
        $email=$request->email_user;
        $password=$request->password_user;
        $user=User::where("email",$email)->where("password",$password)->first();
        if($user){
            return "Success Login";
        }
        return "Email or Password incorrect!";
    }
}
