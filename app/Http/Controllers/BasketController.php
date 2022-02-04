<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function add(Request $request,$product_id){        
        $user_id=Auth::id();
        $exist=Order::where('user_id',$user_id)->where('product_id',$product_id)->first();
        $price=Product::select('discount_price')->where('id',$product_id)->first();
        if($exist){
            $count=Order::select('count','total_price')->where('user_id',$user_id)->where('product_id',$product_id)->first();            
            $total_price=$price['discount_price']*($count['count']+$request->quantity_1);
            Order::where('user_id',$user_id)->where('product_id',$product_id)->update(['count'=>$count['count']+1,'total_price'=>$total_price]);
        }
        else{
            Order::create([
                'user_id'=>$user_id,
                'product_id'=>$product_id,
                'count'=>$request->quantity_1 ?? 1,
                'total_price'=>$price['discount_price']
            ]);
        }

        return redirect()->route('basket.view');
        
    }
    public function basket(Request $request){
        $user_id=Auth::id();
        $orders=Order::select('id','product_id')->where('user_id',$user_id)->get();
        $all_orders=[];
        foreach($orders as $order){            
            $products=Order::select('products.name as product_name','products.id as product_id','orders.count','orders.id','products.discount_price as product_price','products.images as product_images')
            ->join('products','products.id','orders.product_id')
            ->where('product_id',$order->product_id)
            ->get();
            $all_orders[]=$products[0];
        }        
        return view('user.basket',['orders'=>$all_orders]);        
    }
    public function delete($id){
        Order::where('id',$id)->delete();
        return back();
    }    
    public function update(Request $request){             
        $updated=array_values($request->quantity);        ;
        $product_id=array_keys($request->quantity);    
        $i=0;
        foreach($product_id as $id){     
            $price=Product::select('discount_price')->where('id',$id)->first();
            $price=$price['discount_price']*$updated[$i];            
            Order::where('product_id',$id)->update(['count'=>$updated[$i],'total_price'=>$price]);
            $i++;
        }        
        return back();
    }

}
