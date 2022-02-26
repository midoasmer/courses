<?php

use App\Http\Middleware\admin;
use App\Http\Middleware\Authenticate;
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

Route::get('/','App\Http\Controllers\SearchController@index');

Route::get('courses/info/{id}','App\Http\Controllers\SearchController@info')
    ->name('courses.info');
Route::get('courses/filters','App\Http\Controllers\SearchController@filters')
    ->name('courses.filters');
Route::middleware([admin::class])->group(function () {
    Route::middleware([Authenticate::class])->group(function () {
        // ---------------{ Category Routs }----------------------
        Route::get('categories/create', 'App\Http\Controllers\CategoriesController@create')
            ->name('create.category');
        Route::get('deletedCategories', 'App\Http\Controllers\CategoriesController@deletedCategories')
            ->name('deleted.categories');
        Route::get('restoredCategory/{id}', 'App\Http\Controllers\CategoriesController@restoredCategory')
            ->name('restored.category');
        Route::apiResource('categories', 'App\Http\Controllers\CategoriesController')
            ->names('categories');


        // -----------------{ Courses Route }----------------------
        Route::get('courses/index', 'App\Http\Controllers\CoursesController@index')
            ->name('courses.index');

        Route::post('courses/store', 'App\Http\Controllers\CoursesController@store')
            ->name('courses.store');

        Route::get('courses/show/{id}', 'App\Http\Controllers\CoursesController@show')
            ->name('courses.show');

        Route::get('courses/delete/{id}', 'App\Http\Controllers\CoursesController@destroy')
            ->name('courses.delete');

        Route::get('courses/edit/{id}', 'App\Http\Controllers\CoursesController@edit')
            ->name('courses.edit');

        Route::post('courses/update/{id}', 'App\Http\Controllers\CoursesController@update')
            ->name('courses.update');

        Route::get('courses/create', 'App\Http\Controllers\CoursesController@create')
            ->name('create.course');

        Route::get('deletedCourses', 'App\Http\Controllers\CoursesController@deletedCourses')
            ->name('deleted.courses');

        Route::get('restoredCourse/{id}', 'App\Http\Controllers\CoursesController@restoredCourses')
            ->name('restored.course');

        Route::get('/admin', 'App\Http\Controllers\CoursesController@index');
//
//Route::get('/app', function () {
//    return view('layouts.minapp');
//});
//
//Route::get('/dashboard', function () {
//    return view('layouts.dashborde');
//});

    });
});











Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

