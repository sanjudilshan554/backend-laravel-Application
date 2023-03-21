<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LectureRegController;
use App\Http\Controllers\KuppiController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\WorkExpController;
use App\Http\Controllers\EduQualificationController;
use App\Http\Controllers\Allcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlluserProfile;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/student', [StudentController::class, 'store']);
Route::get('/student', [StudentController::class, 'getStudent']);
Route::post('/registration', [RegistrationController::class, 'stroe']);
Route::post('/lecturereg', [LectureRegController::class, 'store']);
Route::post('/kuppi', [KuppiController::class, 'store']);
Route::post('/revision',[RevisionController::class, 'store']);
Route::post('/admin/login',[AuthController::class, 'Adminlogin']);
Route::post('/admin/register',[AuthController::class, 'Adminregister']);
Route::post('/student/login',[AuthController::class, 'Studentlogin']);
Route::post('/lecture/login',[AuthController::class, 'Lecuturelogin']);
Route::post('/Software',[SoftwareController::class,'store']);
Route::post('/subject',[SubjectController::class,'store']);
Route::post('/work_exp',[WorkExpController::class,'store']);
Route::post('/edu_qualify',[EduQualificationController::class,'store']);
Route::post('/update_profile',[Allcontroller::class,'update']);
Route::post('/formSubmit',[PostController::class,'formSubmit']);

Route::post('/profile/data',[AlluserProfile::class,'getProfileData']);
Route::get('/get-post',[PostController::class,'getPostData']);