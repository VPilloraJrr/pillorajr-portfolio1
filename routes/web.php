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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    $data = DB::table('skills')->get();
    return view('welcome', ['data'=>$data]);
});

Route::get('/user', 'UserController@index');
Route::post('/upload', 'UserController@uploadAvatar');
Auth::routes();

Route::get('/dashboard/home', 'HomeController@index')->name('home');
Route::get('/dashboard/skill', 'DashboardController@skill');
Route::get('/dashboard/education', 'DashboardController@education');
Route::get('/dashboard/experience', 'DashboardController@experience');
Route::get('/dashboard/portfolio', 'DashboardController@portfolio');
Route::get('/dashboard/contact', 'DashboardController@contact');


Route::post('/dashboard/contact', 'DashboardController@store');
Route::post('/dashboard/skill', 'DashboardController@storeSkill');
Route::post('/dashboard/education', 'DashboardController@storeEducation');
Route::post('/dashboard/experience', 'DashboardController@storeExperience');
Route::post('/dashboard/portfolio', 'DashboardController@storePortfolio');

Route::post('/skill/upload', 'DashboardController@uploadLogoSkill');



