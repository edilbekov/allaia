<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\SubCategoryController;

Route::get('/',[UserController::class,'welcome']);
Route::get('/auth',[UserController::class,'auth'])->name('auth');
Route::post('/registration',[UserController::class,'registration'])->name('registration');
Route::post('/login',[UserController::class,'login'])->name('login');

Route::get('/single_page/{id}',[SinglePageController::class,'single_page'])->name('single_page');

Route::prefix('/admin')->group(function(){
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