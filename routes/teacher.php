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

namespace App\Http\Controllers\Teachers\dashbores;

use App\Http\Controllers\Teachers\dashbores\QuizzesTeController;
use App\Http\Controllers\Teachers\dashbores\StudentsController as DashboresStudentsController;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () { //..
        //==============================dashboard============================
        Route::get('/teacher/home', function () {
            // $techin = auth()->user()->id;

            // $countofsections = $ids->count();
            //   $countofstudents = Student::whereIn('section_id', $ids)->count();
            $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['countofsections'] =  $ids->count();
            $data['countofstudents'] = Student::whereIn('section_id', $ids)->count();
            return view('pages.Teachers.dashboaed.master', $data);
        })->name('Teacher.home');

        Route::group(['namespace' => 'Teachers/dashbores'], function () {
            Route::get('Students', [DashboresStudentsController::class, 'index'])->name('Students.index');
            Route::get('StudentsListTeacher/{id}', [DashboresStudentsController::class, 'students'])->name('StudentsListTeacher.index');
            Route::get('AttendanceStudents/{id}', [DashboresStudentsController::class, 'attendanceStudents'])->name('AttendanceStudents.index');
            Route::get('Sections', [DashboresStudentsController::class, 'Sections'])->name('Sections');
            Route::post('attendance', [DashboresStudentsController::class, 'Attendance'])->name('Attendance');
            // Route::post('attendance.edit', [DashboresStudentsController::class , 'AttendanceEdite'])->name('attendance.edit');
            Route::get('Attendance.report', [DashboresStudentsController::class, 'Reports'])->name('Attendance.report');
            Route::post('Attendance.search', [DashboresStudentsController::class, 'ReportsSearch'])->name('Attendance.search');
            Route::get('Exam.report', [DashboresStudentsController::class, 'reportsExams'])->name('Exam.report');
            Route::post('Exam.search', [DashboresStudentsController::class, 'reportsSearchExam'])->name('Exam.search');
        });
        /* Quizzes */
        Route::resource('quizzes', QuizzesTeController::class);

        /* Question */
        Route::resource('question', QuestionTeController::class);

        Route::get('Profile', [ProfileController::class, 'index'])->name('Profile.index');
        Route::post('Profile/{id}', [ProfileController::class, 'update'])->name('Profile.update');

        Route::resource('zoom', ZoomController::class);
        Route::get('/Indirect.create', [ZoomController::class, 'indirectCreate'])->name('Indirect.create');
        Route::POST('/Indirect.store', [ZoomController::class, 'indirectStore'])->name('Indirect.store');

        Route::get('student_quizze/{quizze_id}', [QuizzesTeController::class, 'student_quizze'])->name('Student_Quizze');
        Route::post('repeat_quizze', [QuizzesTeController::class, 'repeat_quizze'])->name('repeat.quizze');

    }

);
