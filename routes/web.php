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

use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});
	Route::group(['prefix'=>'loaidiadiem'],function(){
		Route::get('danhsach','LoaiDiaDiemController@getDanhSach');

		Route::get('sua/{id}','LoaiDiaDiemController@getSua');
		Route::post('sua/{id}','LoaiDiaDiemController@postSua');

		Route::get('them','LoaiDiaDiemController@getThem');
		Route::post('them','LoaiDiaDiemController@postThem');

		Route::get('xoa/{id}','LoaiDiaDiemController@getXoa');
	});
	Route::group(['prefix'=>'ttmonan'],function(){
		Route::get('danhsach','TTMonAnController@getDanhSach');

		Route::get('sua/{id}','TTMonAnController@getSua');
		Route::post('sua/{id}','TTMonAnController@postSua');

		Route::get('them','TTMonAnController@getThem');
		Route::post('them','TTMonAnController@postThem');

		Route::get('xoa/{id}','TTMonAnController@getXoa');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaidiadiem/{idTheLoai}', 'AjaxController@getLoaiDiaDiem');
	});

	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{idTTMonAn}','CommentController@getXoa');
	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});
});

Route::get('trangchu','PagesController@trangchu');

Route::get('gioithieu','PagesController@gioithieu');
Route::get('lienhe','PagesController@lienhe');

Route::get('loaidiadiem/{id}/{TenKhongDau}.html','PagesController@loaidiadiem');

Route::get('ttmonan/{id}/{TieuDeKhongDau}.html','PagesController@ttmonan');

Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');
Route::get('dangxuat','PagesController@getDangxuat');
Route::get('nguoidung','PagesController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoiDung');
Route::get('dangky','PagesController@getDangky');
Route::post('dangky','PagesController@postDangky');

Route::post('comment/{id}','CommentController@postComment');

Route::post('timkiem','PagesController@timkiem');
Route::get('theotheloai/{id}/{TenKhongDau}.html','PagesController@theotheloai');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
