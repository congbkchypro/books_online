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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
  'as' => 'trangchu',
  'uses' => 'BaseController@getIndex'
]);


Route::get('index', [
	'as' => 'trangchu',
	'uses' => 'BaseController@getIndex'
]);

Route::get('header', [
  'as' => 'header',
  'uses' => 'BaseController@getHeader'
]);

Route::get('loai-san-pham/{type}', [
  'as' => 'loaisanpham',
  'uses' => 'BaseController@getLoaiSanPham'
]);

// Route::get('loai-san-pham', [
//   'as' => 'loaisanpham',
//   'uses' => 'BaseController@getLoaiSanPham'
// ]);

Route::get('chi-tiet-san-pham/{id}', [
  'as' => 'chitietsanpham',
  'uses' => 'BaseController@getChiTiet'
]);

Route::get('lien-he', [
  'as' => 'lienhe',
  'uses' => 'BaseController@getLienHe'
]);

Route::get('gioi-thieu', [
  'as' =>  'gioithieu',
  'uses' => 'BaseController@getGioiThieu'
]);

Route::get('add-to-cart/{id}', [
  'as' => 'themgiohang',
  'uses' => 'BaseController@getAddToCart'
]);

Route::get('del-cart/{id}', [
  'as' => 'xoagiohang',
  'uses' => 'BaseController@getDelItemCart'
]);

Route::get('dat-hang', [
  'as' => 'dathang',
  'uses' => 'BaseController@getCheckout'
]);

Route::post('dat-hang', [
  'as' => 'dathang',
  'uses' => 'BaseController@postCheckout'
]);

Route::get('dang-nhap', [
  'as' => 'login',
  'uses' => 'BaseController@getLogin'
]);

Route::post('dang-nhap', [
  'as' => 'login',
  'uses' => 'BaseController@postLogin'
]);

Route::get('dang-ky', [
  'as' => 'signin',
  'uses' => 'BaseController@getSignin'
]);

Route::post('dang-ky', [
  'as' => 'signin',
  'uses' => 'BaseController@postSignin'
]);

Route::get('dang-xuat', [
  'as' => 'logout',
  'uses' => 'BaseController@getLogout'
]);

Route::get('search', [
  'as' => 'search',
  'uses' => "BaseController@getSearch"
]);

Route::get('admin', function() {
  return view('admin.layout.index');
});

Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin');

Route::get('admin/dangxuat', 'UserController@getDangXuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function() {
  Route::group(['prefix' => 'theloai'], function() {
    Route::get('danhsach', 'CategoryController@getDanhSach');

    Route::get('sua/{id}', 'CategoryController@getSua');
    Route::post('sua/{id}', 'CategoryController@postSua');

    Route::get('them', 'CategoryController@getThem');
    Route::post('them', 'CategoryController@postThem');
    // Route::get('them', function() {
    //   return view('admin.theloai.them');
    // });
    Route::get('xoa/{id}', 'CategoryController@getXoa');
  });

  Route::group(['prefix' => 'product'], function() {
    Route::get('danhsach', 'ProductController@getDanhSach');

    Route::get('sua/{id}', 'ProductController@getSua');
    Route::post('sua/{id}', 'ProductController@postSua');

    Route::get('them', 'ProductController@getThem');
    Route::post('them', 'ProductController@postThem');

    Route::get('xoa/{id}', 'ProductController@getXoa');
  });

  Route::group(['prefix' => 'user'], function() {
    Route::get('danhsach', 'UserController@getDanhSach');

    Route::get('sua/{id}', 'UserController@getSua');
    Route::post('sua/{id}', 'UserController@postSua');

    Route::get('them', 'UserController@getThem');
    Route::post('them', 'UserController@postThem');

    Route::get('xoa/{id}', 'UserController@getXoa');
  });

  Route::group(['prefix' => 'order'], function() {
    Route::get('danhsach', 'OrderController@getDanhSach');
    Route::get('sua/{id}', 'OrderController@getSua');
    Route::post('sua/{id}', 'OrderController@postSua');
    Route::get('xoa/{id}', 'OrderController@getXoa');
    Route::get('chitiet/{id}', 'OrderController@getChiTiet');
    Route::get('doanh-thu-theo-ngay', 'OrderController@getNgay');
    Route::get('doanh-thu-theo-thang', 'OrderController@getThang');
  });

  Route::group(['prefix' => 'menu'], function() {
    Route::get('danhsach', 'CategoryController@getDanhSach');

    Route::get('sua/{id}', 'CategoryController@getSua');
    Route::post('sua/{id}', 'CategoryController@postSua');

    Route::get('them', 'CategoryController@getThem');
    Route::post('them', 'CategoryController@postThem');
    // Route::get('them', function() {
    //   return view('admin.theloai.them');
    // });
    Route::get('xoa/{id}', 'CategoryController@getXoa');
  });
});