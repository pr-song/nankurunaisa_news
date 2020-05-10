<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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

Route::name('app.')->group(function(){
    /* ##### Static Pages ##### */
    Route::get('/', 'StaticPagesController@home')->name('home');
    Route::get('/about', 'StaticPagesController@about')->name('about');
    Route::get('/contact', 'StaticPagesController@contact')->name('contact');

    /* ##### Post ##### */
    Route::get('/posts/{slug?}', 'PostsController@show')->name('post_detail');

    /* ##### Commnent ##### */
    Route::post('/comment', 'CommentsController@newComment')->middleware('auth')->name('new_comment');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::name('manager.')->group(function(){
    /* ##### Admin ##### */
    Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), function(){
        /* ##### Users #####*/
        Route::get('users','UsersController@index')->name('all_users');

        /* ##### Roles ##### */
        Route::get('roles', 'RolesController@index')->name('all_roles');
        Route::get('roles/create', 'RolesController@create')->name('new_role');
        Route::post('roles/create', 'RolesController@store');
        Route::get('users/{id?}/edit_user_role', 'UsersController@edit_user_role')->name('edit_user_role');
        Route::post('users/{id?}/edit_user_role', 'UsersController@update_user_role');
        /* ##### Admin Dashboard ##### */
        Route::get('/', 'PagesController@home')->name('admin_dashboard');

        /* ##### Categories ##### */
        Route::get('categories', 'CategoriesController@index')->name('all_categories');
        Route::get('categories/create', 'CategoriesController@create')->name('new_category');
        Route::post('categories/create', 'CategoriesController@store');

        /* ##### Posts ##### */
        Route::get('posts', 'PostsController@index')->name('all_posts');
        Route::get('posts/create', 'PostsController@create')->name('new_post');
        Route::post('posts/create', 'PostsController@store');
    });
});

Route::get('/redis', function(){
    $redis = Redis::connection();
    $redis->set('key2', 'value2');

    return $redis->get('key2');
});
