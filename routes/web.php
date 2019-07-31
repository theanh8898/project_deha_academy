<?php

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

Route::get('hocsinh', 'HocsinhController@index'); // Hiển thị danh sách học sinh
Route::get('hocsinh/create', 'HocsinhController@create'); // Thêm mới học sinh
Route::post('hocsinh/create', 'HocsinhController@store'); // Xử lý thêm mới học sinh
Route::get('hocsinh/{id}/edit', 'HocsinhController@edit'); // Sửa học sinh
Route::post('hocsinh/update', 'HocsinhController@update'); // Xử lý sửa học sinh
Route::get('hocsinh/{id}/delete', 'HocsinhController@destroy'); // Xóa học sinh

Route::resource('posts', 'PostsController');
Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'));


Route::get('/', function () {
    return view('index');
});

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dangnhap', 'UserController@getLoginAdmin');
Route::post('dangnhap', 'UserController@postLoginAdmin')->name('postForm');
Route::get('logout', 'UserController@getLogoutAdmin');

Route::post('search', 'LaptopsController@search');

Route::get('listoftype/{id}', 'LaptopTypeController@showAllLaptop');


Route::resource('laptops', 'LaptopsController')->middleware('admin');
Route::resource('laptoptypes', 'LaptopTypeController')->middleware('admin');

