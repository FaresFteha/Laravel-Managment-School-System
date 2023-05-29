<?php



/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Students\dashbores\ExamsController;
use App\Http\Controllers\Students\dashbores\SettingController;
use App\Http\Controllers\Students\StudentdashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ],
    function () { //..
        //==============================dashboard============================
        Route::get('/student/home' , function () {
            return view('pages.Students.master');
        })->name('Home.Student');

        Route::resource('Student_Exams' , ExamsController::class);
        Route::get('Student/SemesterMarks' ,  [StudentdashboardController::class ,'semesterMarks'] )->name('Student.semesterMarks');
        Route::get('Student/Avareg' ,  [StudentdashboardController::class ,'Avareg'] )->name('Student.Avareg');
        Route::get('Student/examsSchedule' ,  [StudentdashboardController::class ,'examsSchedule'] )->name('Student.examsSchedule');
        Route::get('Student/books' ,  [StudentdashboardController::class ,'books'] )->name('Student.books');
        Route::get('Student/Zoom' ,  [StudentdashboardController::class ,'zooms'] )->name('Student.Zoom');
        Route::get('Profile.Student' , [SettingController::class , 'index'])->name('Profile.Student');
        Route::get('student/downloadAttachment/{filename}' , [StudentdashboardController::class , 'downloadAttachment'])->name('student.downloadAttachment');
        Route::post('profile-student.update/{id}' , [SettingController::class , 'update'])->name('profile-student.update');
    }   

);
