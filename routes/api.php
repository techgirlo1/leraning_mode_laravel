<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomeController;

//chart
Route::get('/chart',[ChartController::class,'allChart']);


//reviews
Route::get('/reviews',[ClientReviewController::class,'allReviews']);


//Contact
Route::get('/contact',[ContactController::class,'allContact']);
Route::post('/contact_us',[ContactController::class,'insert']);


//videos
Route::get('/coursehome',[CoursesController::class,'insertCourse']);
Route::get('/courseall',[CoursesController::class,'insertAllCourse']);
Route::get('/coursedetails/{courseid}',[CoursesController::class,'insertCourseDetails']);

//footer
Route::get('/footer',[FooterController::class,'getFooter']);


//information
Route::get('/info',[InformationController::class,'info']);

//services
Route::get('/allservices',[ServiceController::class,'allservices']);


//project
Route::get('/projecthome',[ProjectController::class,'getProject']);
Route::get('/projectall',[ProjectController::class,'getAllProject']);
Route::get('/projectdetails/{projectid}',[ProjectController::class,'getProjectDetails']);


//home
Route::get('/home/video',[HomeController::class,'getvideoDetails']);
Route::get('/home',[HomeController::class,'gethomeDetails']);
Route::get('/home/title',[HomeController::class,'hometitleDetails']);
Route::get('/home/tech',[HomeController::class,'gettechDetails']);
Route::get('/home/about',[HomeController::class,'getimageDetails']);