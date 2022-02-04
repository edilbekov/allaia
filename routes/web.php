<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Middleware\Lang;

Route::middleware(Lang::class)->group(function(){
    Route::get('/',[UserController::class,'welcome'])->name('welcome');
    Route::get('/auth',[UserController::class,'auth'])->name('auth');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::post('/registration',[UserController::class,'registration'])->name('registration');
    Route::post('/login',[UserController::class,'login'])->name('login');
    Route::get('/categories/{subcategory}',[UserController::class,'subcategory'])->name('subcategory');

    Route::get('/categories/{subcategory}/sort',[UserController::class,'sort'])->name('sort');

    Route::get('/search',[UserController::class,'search'])->name('search');

    Route::get('/favourite/{product_id}',[FavouriteController::class,'favourite'])->name('favourite');
    Route::get('/wishlist',[FavouriteController::class,'wishlist'])->name('wishlist');
    Route::get('/wishlist/delete/{wishlist_id}',[FavouriteController::class,'delete'])->name('del.from.wishlist');

    Route::get('/basket',[BasketController::class,'basket'])->name('basket.view');
    Route::get('/add_to_cart/{product_id}',[BasketController::class,'add'])->name('addtocart');
    Route::get('/basket/delete/{id}',[BasketController::class,'delete'])->name('order.delete');
    Route::post('/update',[BasketController::class,'update'])->name('update_order');

    Route::get('/single_page/{id}',[SinglePageController::class,'single_page'])->name('single_page');

    Route::post('/contact',[UserController::class,'contact'])->name('contact');
    Route::get('/contacting',[UserController::class,'contacting'])->name('contacting');

    Route::post('/check/{email}',[UserController::class,'check_code'])->name('check_code');
});

Route::middleware('auth:sanctum')->prefix('/admin')->group(function(){
    //Category
    Route::get('/',[CategoryController::class,'welcome']);
    Route::get('/add',[CategoryController::class,'add'])->name('add');
    Route::post('/add_category',[CategoryController::class,'add_category'])->name('add_category');
    Route::get('/categories',[CategoryController::class,'categories'])->name('categories');
    Route::post('/delete/{id}',[CategoryController::class,'delete'])->name('delete');
    Route::post('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::post('/edit_category/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
    //Sub Category
    Route::get('/add_sub',[SubCategoryController::class,'add'])->name('add_sub');
    Route::post('/add_subcategory',[SubCategoryController::class,'add_category'])->name('add_subcategory');
    Route::get('/subcategories',[SubCategoryController::class,'subcategories'])->name('subcategories');
    Route::post('/delete_sub/{id}',[SubCategoryController::class,'delete'])->name('delete_sub');
    Route::post('/edit_sub/{id}',[SubCategoryController::class,'edit'])->name('edit_sub');
    Route::post('/edit_subcategory/{id}',[SubCategoryController::class,'edit_category'])->name('edit_subcategory');
    //Product
    Route::get('/product',[ProductController::class,'product'])->name('product');
    Route::post('/product/add',[ProductController::class,'add_product'])->name('add_product');
    Route::get('/list',[ProductController::class,'list'])->name('list');
    Route::post('/product/delete/{id}',[ProductController::class,'delete'])->name('delete_product');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('edit_product');
    Route::post('/product/edit/{id}',[ProductController::class,'edited'])->name('edited');
});

Route::get('/lang/{lang}',function($key){
    $lang=['uz','en'];
    if(in_array($key,$lang)){
        $cookie=cookie('lang',$key,60);
        return redirect()->route('welcome')->withCookie($cookie);
    }
    return back();
});