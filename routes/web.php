<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::get('/',[ProductController::class,'index'])->name('index');
Route::get('/ejemplo',function(){
    return Category::all();
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/product/create','create')->name('producto_create');
    Route::post('/product/store','store')->name('producto_store');
    Route::get('/product/{id}/show','show')->name('producto_show');
    Route::get('/product/{id}/edit','edit')->name('producto_edit');
    Route::put('/product/{product}','update')->name('producto_update');
    Route::delete('/product/{id}','destroy')->name('producto_destroy');
   
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/category','index')->name('categoria_index');//LISTA 
    Route::get('/category/create','create')->name('categoria_create');
    Route::post('/category','store')->name('categoria_store');
    Route::get('/category/{category}','show')->name('categoria_show');
    Route::get('/category/{id}/edit','edit')->name('categoria_edit');
    Route::put('/category/{category}','update')->name('categoria_update');
    Route::delete('/category/{category}','destroy')->name('categoria_destroy');
});

