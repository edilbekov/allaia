<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;

Route::get('/category/{id}',[SubCategoryController::class,"subcategory"]);