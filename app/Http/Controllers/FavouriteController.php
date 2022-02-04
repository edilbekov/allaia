<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function favourite(Request $request ,$product_id){        
        $user_id=Auth::user()->id;
        $exist=Favourite::where('user_id',$user_id)->where('product_id',$product_id)->first();
        if($exist){
            Favourite::where('user_id',$user_id)->where('product_id',$product_id)->delete();
        }
        else{
            Favourite::create([
                'product_id'=>$product_id,
                'user_id'=>$user_id
            ]);
        }        
    }
    public function wishlist(Request $request){                
        $user_id=Auth::user()->id;        
        $wishlist_products=Favourite::select('favourites.id as id','products.name as name','products.discount_price as price','products.images as images')
        ->join('products','products.id','favourites.product_id')
        ->where('user_id',$user_id)
        ->get();        
        return view('user.wishlist',['wishlist'=>$wishlist_products]);
    }
    public function delete($wishlist_id){        
        Favourite::where('id',$wishlist_id)->delete();
        return back();
    }
}   
