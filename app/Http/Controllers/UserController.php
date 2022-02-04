<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function welcome(){
        $categories=Category::select('id','name')->get();
        $orders=Order::select('product_id')->get();
        $products=Product::select('id','name','price','discount_price','images','all_view')
        ->orderBy('id','desc')
        ->limit(8)
        ->get(); 
        $slider_products=Product::select('price','discount_price','name','images')->orderBy('all_view','desc')->limit(3)->get();         
        $all_view=Product::select('all_view','name','images','discount_price')->orderBy('all_view','desc')->limit(4)->get();        
        return view('user.main',['categories'=>$categories,'products'=>$products,'all_view'=>$all_view,'orders'=>$orders,'slider_products'=>$slider_products]);
    }
    public function auth(){        
        return view('user.auth');
    }
    public function registration(Request $request){
        $data=$request->validate([
            'email'=>'email|unique:users,email',
            'name'=>'required|max:32|min:3|string',
            'password'=>['required','confirmed',Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);                        
        $code=rand(9999,99999);
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),            
            'code'=>$code
        ]);
       
        Mail::to($data['email'])->send(new \App\Mail\Mail($code));

        return view('user.check_code',['email'=>$data['email']]);

    }
    public function check_code(Request $request,$email){
        $codes=$request->code;
        $correct=User::select('code')->where('email',$email)->first();
        if($correct->code!=$codes){
            User::where('email',$email)->delete();
        }
        return redirect()->route('welcome');
    }
    
    public function login(Request $request){
        $data=$request->validate([
            'email'=>'email|required|exists:users,email',
            'password'=>['required',Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);
        if(Auth::attempt($data)){
            $request->session()->regenerate();            
            return redirect()->route('welcome');
        }
        return back();
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();
    }

    public function subcategory($subcategory){        
        $categories=Category::select('id','name')->get();
        $id=SubCategory::select('id')->where('name',$subcategory)->first();      
        $products=Product::select('id','name','price','discount_price','images')            
            ->where('sub_category_id',$id['id'])
            ->paginate(1);
                
        return view('user.subcategory',['products'=>$products,'subcategory'=>$subcategory,'categories'=>$categories]);
    }
    public function search(Request $request){
        $search=$request->search;
        $results=Product::select('id','name','images','discount_price')->where('name','LIKE', '%'.$search.'%')->paginate(1);
        return view('user.search',['search'=>$results]);        
    }
    public function contact(Request $request){        
        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
       
        Mail::to('azizbekedilbekov5@gmail.com')->send(new \App\Mail\Mail($details));
        return back();
    }    
    public function contacting(){
        return view('user.contact');
    }

    public function sort(Request $request,$subcategory){
        $sort=$request->sort;
        if($sort=='date'){
            $categories=Category::select('id','name')->get();
            $id=SubCategory::select('id')->where('name',$subcategory)->first();      
            $products=Product::select('id','name','price','discount_price','images')   
                ->orderBy('created_at','desc')         
                ->where('sub_category_id',$id['id'])
                ->paginate(1);                            
        }
        elseif($sort=='popularity'){
            $categories=Category::select('id','name')->get();
            $id=SubCategory::select('id')->where('name',$subcategory)->first();      
            $products=Product::select('id','name','price','discount_price','images')            
                ->orderBy('all_view','desc')
                ->where('sub_category_id',$id['id'])
                ->paginate(1);    
        }
        elseif($sort=='price_low'){
            $categories=Category::select('id','name')->get();
            $id=SubCategory::select('id')->where('name',$subcategory)->first();      
            $products=Product::select('id','name','price','discount_price','images')            
                ->orderBy('discount_price','asc')
                ->where('sub_category_id',$id['id'])
                ->paginate(1);                            
        }
        elseif($sort=='price_high'){
            $categories=Category::select('id','name')->get();
            $id=SubCategory::select('id')->where('name',$subcategory)->first();      
            $products=Product::select('id','name','price','discount_price','images')            
                ->orderBy('discount_price','desc')    
                ->where('sub_category_id',$id['id'])
                ->paginate(1);                                
        }
        else{
            return 'basqa zat kiritildi';
        }
        return view('user.subcategory',['products'=>$products,'subcategory'=>$subcategory,'categories'=>$categories]);
    }
}
