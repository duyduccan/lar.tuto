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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
 * Route cho administrator
 * */
Route::prefix('admin')->group(function(){
    /*
     * gom nhóm các Route cho phần admin*/

    /*
     * URL: authen.com/admin/
     * Route mặc định của admin
     * */
    Route::get('/','AdminController@index')->name('admin.dashboard');

    /*
     * URL: authen.com/admin/dashboard
     * Route đăng nhập thành công
     * */
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    /*
     *URL: authen.com/admin/register
     * Route trả về view dùng để đăng ký tài khoản admin
     * */
    Route::get('register','AdminController@create')->name('admin.register');

    /*
     * URL: authen.com/admin/register
     * Method: POST
     * Route dùng để đăng ký 1 admin từ form POST
     * */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /*
     * URL: authen.com/admin/login
     * Method: GET
     * Route trả về view đăng nhập admin
     * */
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');
    /*
     * URL: authen.com/admin/login
     * Method: POST
     * Route xử lý quá trình đăng nhập admin
     * */
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /*
     * URL: authen.com/admin/logout
     * Method: POST
     * Route dùng để đăng xuất
     * */
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});
