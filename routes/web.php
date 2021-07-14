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



//  $$$$$$\  $$\       $$\ $$\ $$\       $$$$$$$\                        $$\               
// $$  __$$\ $$ |      \__|$$ |$$ |      $$  __$$\                       $$ |              
// $$ /  \__|$$ |  $$\ $$\ $$ |$$ |      $$ |  $$ | $$$$$$\  $$\   $$\ $$$$$$\    $$$$$$\  
// \$$$$$$\  $$ | $$  |$$ |$$ |$$ |      $$$$$$$  |$$  __$$\ $$ |  $$ |\_$$  _|  $$  __$$\ 
//  \____$$\ $$$$$$  / $$ |$$ |$$ |      $$  __$$< $$ /  $$ |$$ |  $$ |  $$ |    $$$$$$$$ |
// $$\   $$ |$$  _$$<  $$ |$$ |$$ |      $$ |  $$ |$$ |  $$ |$$ |  $$ |  $$ |$$\ $$   ____|
// \$$$$$$  |$$ | \$$\ $$ |$$ |$$ |      $$ |  $$ |\$$$$$$  |\$$$$$$  |  \$$$$  |\$$$$$$$\ 
//  \______/ \__|  \__|\__|\__|\__|      \__|  \__| \______/  \______/    \____/  \_______|

                                                                                                                                                                            
Route::get('/dashboard/skill', 'SkillController@index'); //display skill data
Route::get('/dashboard/skill/delete/{id}', 'SkillController@destroy'); //delete a skill record
Route::get('/dashboard/skill/edit/{id}','SkillController@show'); //get ID
Route::post('/dashboard/skill/edit/{id}','SkillController@edit'); //edit a skill data
Route::post('/dashboard/skill', 'SkillController@storeSkill'); //create new data


/*  $$$$$$$\   $$$$$$\  $$$$$$$\ $$$$$$$$\ $$$$$$$$\  $$$$$$\  $$\       $$$$$$\  $$$$$$\        $$$$$$$\                        $$\               
    $$  __$$\ $$  __$$\ $$  __$$\\__$$  __|$$  _____|$$  __$$\ $$ |      \_$$  _|$$  __$$\       $$  __$$\                       $$ |              
    $$ |  $$ |$$ /  $$ |$$ |  $$ |  $$ |   $$ |      $$ /  $$ |$$ |        $$ |  $$ /  $$ |      $$ |  $$ | $$$$$$\  $$\   $$\ $$$$$$\    $$$$$$\  
    $$$$$$$  |$$ |  $$ |$$$$$$$  |  $$ |   $$$$$\    $$ |  $$ |$$ |        $$ |  $$ |  $$ |      $$$$$$$  |$$  __$$\ $$ |  $$ |\_$$  _|  $$  __$$\ 
    $$  ____/ $$ |  $$ |$$  __$$<   $$ |   $$  __|   $$ |  $$ |$$ |        $$ |  $$ |  $$ |      $$  __$$< $$ /  $$ |$$ |  $$ |  $$ |    $$$$$$$$ |
    $$ |      $$ |  $$ |$$ |  $$ |  $$ |   $$ |      $$ |  $$ |$$ |        $$ |  $$ |  $$ |      $$ |  $$ |$$ |  $$ |$$ |  $$ |  $$ |$$\ $$   ____|
    $$ |       $$$$$$  |$$ |  $$ |  $$ |   $$ |       $$$$$$  |$$$$$$$$\ $$$$$$\  $$$$$$  |      $$ |  $$ |\$$$$$$  |\$$$$$$  |  \$$$$  |\$$$$$$$\ 
    \__|       \______/ \__|  \__|  \__|   \__|       \______/ \________|\______| \______/       \__|  \__| \______/  \______/    \____/  \_______|
                                                                                                                                                
*/                                                                                                                                            
                                                                                   

Route::get('/dashboard/portfolio', 'PortfolioController@index'); //display portfolio data
Route::get('/dashboard/portfolio/delete/{id}', 'PortfolioController@destroy'); //delete a portfolio record
Route::get('/dashboard/portfolio/edit/{id}','PortfolioController@show'); //get ID
Route::post('/dashboard/portfolio/edit/{id}','PortfolioController@edit'); //edit a portfolio data
Route::post('/dashboard/portfolio', 'PortfolioController@storePortfolio'); //create new data


/*  $$$$$$$$\      $$\                               $$\     $$\                           $$$$$$$\                        $$\               
    $$  _____|     $$ |                              $$ |    \__|                          $$  __$$\                       $$ |              
    $$ |      $$$$$$$ |$$\   $$\  $$$$$$$\ $$$$$$\ $$$$$$\   $$\  $$$$$$\  $$$$$$$\        $$ |  $$ | $$$$$$\  $$\   $$\ $$$$$$\    $$$$$$\  
    $$$$$\   $$  __$$ |$$ |  $$ |$$  _____|\____$$\\_$$  _|  $$ |$$  __$$\ $$  __$$\       $$$$$$$  |$$  __$$\ $$ |  $$ |\_$$  _|  $$  __$$\ 
    $$  __|  $$ /  $$ |$$ |  $$ |$$ /      $$$$$$$ | $$ |    $$ |$$ /  $$ |$$ |  $$ |      $$  __$$< $$ /  $$ |$$ |  $$ |  $$ |    $$$$$$$$ |
    $$ |     $$ |  $$ |$$ |  $$ |$$ |     $$  __$$ | $$ |$$\ $$ |$$ |  $$ |$$ |  $$ |      $$ |  $$ |$$ |  $$ |$$ |  $$ |  $$ |$$\ $$   ____|
    $$$$$$$$\\$$$$$$$ |\$$$$$$  |\$$$$$$$\\$$$$$$$ | \$$$$  |$$ |\$$$$$$  |$$ |  $$ |      $$ |  $$ |\$$$$$$  |\$$$$$$  |  \$$$$  |\$$$$$$$\ 
    \________|\_______| \______/  \_______|\_______|  \____/ \__| \______/ \__|  \__|      \__|  \__| \______/  \______/    \____/  \_______|
*/                                                                                                                              


Route::get('/dashboard/education', 'EducationController@index'); //display education data
Route::get('/dashboard/education/delete/{id}', 'EducationController@destroy'); //delete an education record
Route::get('/dashboard/education/edit/{id}','EducationController@show'); //get ID
Route::post('/dashboard/education/edit/{id}','EducationController@edit'); //edit an education data
Route::post('/dashboard/education', 'EducationController@storeEducation'); //create new data


/*  $$$$$$$$\                                         $$\                                               $$$$$$$\                        $$\               
    $$  _____|                                        \__|                                              $$  __$$\                       $$ |              
    $$ |      $$\   $$\  $$$$$$\   $$$$$$\   $$$$$$\  $$\  $$$$$$\  $$$$$$$\   $$$$$$$\  $$$$$$\        $$ |  $$ | $$$$$$\  $$\   $$\ $$$$$$\    $$$$$$\  
    $$$$$\    \$$\ $$  |$$  __$$\ $$  __$$\ $$  __$$\ $$ |$$  __$$\ $$  __$$\ $$  _____|$$  __$$\       $$$$$$$  |$$  __$$\ $$ |  $$ |\_$$  _|  $$  __$$\ 
    $$  __|    \$$$$  / $$ /  $$ |$$$$$$$$ |$$ |  \__|$$ |$$$$$$$$ |$$ |  $$ |$$ /      $$$$$$$$ |      $$  __$$< $$ /  $$ |$$ |  $$ |  $$ |    $$$$$$$$ |
    $$ |       $$  $$<  $$ |  $$ |$$   ____|$$ |      $$ |$$   ____|$$ |  $$ |$$ |      $$   ____|      $$ |  $$ |$$ |  $$ |$$ |  $$ |  $$ |$$\ $$   ____|
    $$$$$$$$\ $$  /\$$\ $$$$$$$  |\$$$$$$$\ $$ |      $$ |\$$$$$$$\ $$ |  $$ |\$$$$$$$\ \$$$$$$$\       $$ |  $$ |\$$$$$$  |\$$$$$$  |  \$$$$  |\$$$$$$$\ 
    \________|\__/  \__|$$  ____/  \_______|\__|      \__| \_______|\__|  \__| \_______| \_______|      \__|  \__| \______/  \______/    \____/  \_______|
                        $$ |                                                                                                                              
                        $$ |                                                                                                                              
                        \__|                                                                                                                              
*/  


Route::get('/dashboard/experience', 'ExperienceController@index'); //display data
Route::get('/dashboard/experience/delete/{id}', 'ExperienceController@destroy'); //delete record
Route::get('/dashboard/experience/edit/{id}','ExperienceController@show'); //get ID
Route::post('/dashboard/experience/edit/{id}','ExperienceController@edit'); //edit  data
Route::post('/dashboard/experience', 'ExperienceController@storeExperience');     //create new data                                                                                                                                                 
        

/*  $$$$$$\                       $$\                           $$\           $$$$$$$\                        $$\               
    $$  __$$\                      $$ |                          $$ |          $$  __$$\                       $$ |              
    $$ /  \__| $$$$$$\  $$$$$$$\ $$$$$$\    $$$$$$\   $$$$$$$\ $$$$$$\         $$ |  $$ | $$$$$$\  $$\   $$\ $$$$$$\    $$$$$$\  
    $$ |      $$  __$$\ $$  __$$\\_$$  _|   \____$$\ $$  _____|\_$$  _|        $$$$$$$  |$$  __$$\ $$ |  $$ |\_$$  _|  $$  __$$\ 
    $$ |      $$ /  $$ |$$ |  $$ | $$ |     $$$$$$$ |$$ /        $$ |          $$  __$$< $$ /  $$ |$$ |  $$ |  $$ |    $$$$$$$$ |
    $$ |  $$\ $$ |  $$ |$$ |  $$ | $$ |$$\ $$  __$$ |$$ |        $$ |$$\       $$ |  $$ |$$ |  $$ |$$ |  $$ |  $$ |$$\ $$   ____|
    \$$$$$$  |\$$$$$$  |$$ |  $$ | \$$$$  |\$$$$$$$ |\$$$$$$$\   \$$$$  |      $$ |  $$ |\$$$$$$  |\$$$$$$  |  \$$$$  |\$$$$$$$\ 
    \______/  \______/ \__|  \__|  \____/  \_______| \_______|   \____/       \__|  \__| \______/  \______/    \____/  \_______|
*/                                                                                                                        


Route::get('/dashboard/contact', 'ContactController@index'); //display data
Route::get('/dashboard/contact/delete/{id}', 'ContactController@destroy'); //delete record
Route::post('/dashboard/contact', 'ContactController@storeContact');
                                                                                                                                                      
                                                                                                                                                      
                                                                                                                                                      
                                                                                                                                                      
                                                                                                                                                      
                                                                                                                                                      