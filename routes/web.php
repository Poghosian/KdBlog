<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController');
    });

    Route::group(['namespace' => 'Portfolio', 'prefix' => 'portfolio'], function () {
        Route::get('/', 'IndexController')->name('admin.portfolio.index');
        Route::get('/create', 'CreateController')->name('admin.portfolio.create');
        Route::post('/', 'StoreController')->name('admin.portfolio.store');
        Route::get('/{portfolio}', 'ShowController')->name('admin.portfolio.show');
        Route::get('/{portfolio}/edit', 'EditController')->name('admin.portfolio.edit');
        Route::patch('/{portfolio}', 'UpdateController')->name('admin.portfolio.update');
        Route::delete('/{portfolio}', 'DestroyController')->name('admin.portfolio.destroy');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });
});

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
