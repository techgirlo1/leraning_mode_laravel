<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ContactController;
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


Route::get('/route-cache', function(){
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth.and.logout'], function () {
    // Your routes that require authentication

    
    
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('dashboard');
    });

    //logout routes
    
    Route::get('logout', [UserController::class,'adminlogout'] )->name("logout");

    // ... other routes




Route::prefix('admin')->group(function(){
    Route::get('/user_profile', [UserController::class,'profile'] )->name("user_profile");
    Route::get('/edit_profile', [UserController::class,'editprofile'] )->name("edit_profile");
    Route::post('/edit_profile/insert', [UserController::class,'updateprofile'] )->name("insertprofile");
    Route::get('/changepassword', [UserController::class,'resetpassword'] )->name("change_password");
    Route::post('/changepassword/insert', [UserController::class,'insertpassword'] )->name("changepassword");
});
    




Route::prefix('information')->group(function(){
    Route::get('/all_info', [InformationController::class,'allinfo'] )->name("all_info");
    Route::get('/add_info', [InformationController::class,'addinfo'] )->name("add_info");
    Route::post('/add_info/insert', [InformationController::class,'insertinfo'] )->name("insert_info");
    Route::get('/edit/{id}', [InformationController::class,'editinfo'] );
    Route::post('/editinfo/{id}', [InformationController::class,'storeinfo'] );
    Route::get('/deleteinfo/{id}', [InformationController::class,'deleteinfo'] );
   
   
});


Route::prefix('service')->group(function(){
    Route::get('/all_service', [ServiceController::class,'allservice'] )->name("all_service");
    Route::get('/add_service', [ServiceController::class,'addservice'] )->name("add_service");
    Route::post('/add_service/insert', [ServiceController::class,'insertservice'] )->name("insert_service");
    Route::get('/edit/{id}', [ServiceController::class,'edit'] );
    Route::post('/edit_service/{id}', [ServiceController::class,'editservice'] );
    Route::get('/delete/{id}', [ServiceController::class,'deleteservice'] );
   
   
});


Route::prefix('project')->group(function(){
    Route::get('/all_project', [ProjectController::class,'allproject'] )->name("all_project");
    Route::get('/add_project', [ProjectController::class,'addproject'] )->name("add_project");
    Route::post('/add_project/insert', [ProjectController::class,'insertproject'] )->name("insert_project");
    Route::get('/edit/{id}', [ProjectController::class,'edit'] );
    Route::post('/edit_project/{id}', [ProjectController::class,'editproject'] );
    Route::get('/delete/{id}', [ProjectController::class,'deleteproject'] );
   
   
});


Route::prefix('course')->group(function(){
    Route::get('/all_course', [CoursesController::class,'allcourse'] )->name("all_course");
    Route::get('/add_course', [CoursesController::class,'addcourse'] )->name("add_course");
    Route::post('/add_course/insert', [CoursesController::class,'insertcourses'] )->name("insert_course");
    Route::get('/edit/{id}', [CoursesController::class,'edit'] );
    Route::post('/edit_course/{id}', [CoursesController::class,'editcourse'] );
    Route::get('/delete/{id}', [CoursesController::class,'deleteproject'] );
   
   
});

Route::prefix('review')->group(function(){
    Route::get('/all_review', [ClientReviewController::class,'allreview'] )->name("all_review");
    Route::get('/add_review', [ClientReviewController::class,'addreview'] )->name("add_review");
    Route::post('/add_review/insert', [ClientReviewController::class,'insertreview'] )->name("insert_review");
    Route::get('/edit/{id}', [ClientReviewController::class,'edit'] );
    Route::post('/edit_review/{id}', [ClientReviewController::class,'editreview'] );
    Route::get('/delete/{id}', [ClientReviewController::class,'deletereview'] );
   
   
});


Route::prefix('chart')->group(function(){
    Route::get('/all_chart', [ChartController::class,'chart'] )->name("all_chart");
    Route::get('/add_chart', [ChartController::class,'addchart'] )->name("add_chart");
    Route::post('/add_chart/insert', [ChartController::class,'insertchart'] )->name("insert_chart");
    Route::get('/edit/{id}', [ChartController::class,'edit'] );
    Route::post('/edit_chart/{id}', [ChartController::class,'editchart'] );
    Route::get('/delete/{id}', [ChartController::class,'deletechart'] );
   
   
});



Route::prefix('footer')->group(function(){
    Route::get('/all_footer', [FooterController::class,'footer'] )->name("all_footer");
    Route::get('/add_footer', [FooterController::class,'addfooter'] )->name("add_footer");
    Route::post('/add_footer/insert', [FooterController::class,'insertfooter'] )->name("insert_footer");
    Route::get('/edit/{id}', [FooterController::class,'edit'] );
    Route::post('/edit_footer/{id}', [FooterController::class,'editfooter'] );
    Route::get('/delete/{id}', [FooterController::class,'deletefooter'] );
   
   
});


Route::prefix('home')->group(function(){
    Route::get('/all_home', [HomeController::class,'home'] )->name("all_home");
    Route::get('/add_home', [HomeController::class,'addhome'] )->name("add_home");
    Route::post('/add_home/insert', [HomeController::class,'inserthome'] )->name("insert_home");
    Route::get('/edit/{id}', [HomeController::class,'edit'] );
    Route::post('/edit_home/{id}', [HomeController::class,'edithome'] );
    Route::get('/delete/{id}', [HomeController::class,'deletehome'] );
   
   
});

Route::prefix('contact')->group(function(){
    Route::get('/all_contact', [ContactController::class,'contact'] )->name("all_contact");
    Route::get('/delete/{id}', [ContactController::class,'deletecontact'] );
   
   
});


});


