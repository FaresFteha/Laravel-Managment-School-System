<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Exams\ExamsController;
use App\Http\Controllers\Fees\FeeInvoicesController;
use App\Http\Controllers\Fees\PaymentController;
use App\Http\Controllers\Fees\ProccesingFeesController;
use App\Http\Controllers\Fees\ReceiptController;
use App\Http\Controllers\Frontend\EventsController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\permission\RoleController;
use App\Http\Controllers\permission\UserController;
use App\Http\Controllers\Questions\QuestionsController;
use App\Http\Controllers\Quizzes\QuizzesController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\SMS\SMSStudentsController;
use App\Http\Controllers\Students\Students_averageController;
use App\Http\Controllers\Students\StudentsController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Zoom\ZoomController;
use App\Models\Library;
use App\Models\OnlineClasse;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// routes/web.php



// This code defines a group of routes with a set of middleware that gets executed before the route handler functions.
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), // Adds localization to the URL prefixes
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] // Middleware for Localization - Redirects and Views
    ],
    function () { //..

        Auth::routes(['login', 'register', 'logout']); // Authentication Routes

        Route::group(['namespace' => 'Auth'], function () { // Grouping with namespaces
            // Login Route with middleware guest
            Route::get('/login/{type}', [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
            // Login post request route
            Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('log-in');
            // Logout Route
            Route::get('/logout/{type}', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('log-out');
        });



        // Home Page
        Route::get('/', [HomeController::class, 'index'])->name('selection');
        // Protected authenticated home page
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');


        // Resourceful Routes with middleware auth
        Route::group(['middleware' => ['auth']], function () {

            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
        });


        // Defines a route group with the prefix 'Grades'
        Route::prefix('Grades')->group(function () {
            Route::get('/GradesTableview', 'App\Http\Controllers\Grades\GradeController@index')->name('GradesTableview');
            Route::post('/Grades.store', 'App\Http\Controllers\Grades\GradeController@store')->name('Grades.store');
            Route::post('/Grades.update', 'App\Http\Controllers\Grades\GradeController@update')->name('Grades.update');
            Route::post('/Grades.destroy', 'App\Http\Controllers\Grades\GradeController@destroy')->name('Grades.destroy');
        });


        // Defines a route group with the prefix 'Classrooms'
        Route::prefix('Classrooms')->group(function () {
            Route::get('/ClassTableview', 'App\Http\Controllers\Classroms\ClassroomController@index')->name('ClassTableview');
            Route::post('/Classrooms.store', 'App\Http\Controllers\Classroms\ClassroomController@store')->name('Classrooms.store');
            Route::post('/Classrooms.update', 'App\Http\Controllers\Classroms\ClassroomController@update')->name('Classrooms.update');
            Route::post('/Classrooms.destroy', 'App\Http\Controllers\Classroms\ClassroomController@destroy')->name('Classrooms.destroy');
            Route::post('/delete_all', 'App\Http\Controllers\Classroms\ClassroomController@delete_all')->name('delete_all');

            Route::post('/FilterClasses', 'App\Http\Controllers\Classroms\ClassroomController@Filter_Classes')->name('FilterClasses');
        });

        // Defines a route group with the prefix 'Sections'
        Route::prefix('Sections')->group(function () {
            Route::get('/SectionsTableview', 'App\Http\Controllers\Sections\SectionController@index')->name('SectionsTableview');
            Route::post('/Sections.store', 'App\Http\Controllers\Sections\SectionController@store')->name('Sections.store');
            Route::post('/Sections.update', 'App\Http\Controllers\Sections\SectionController@update')->name('Sections.update');
            Route::post('/Sections.destroy', 'App\Http\Controllers\Sections\SectionController@destroy')->name('Sections.destroy');
        });

        // Defines a route group with the prefix 'Parents'
        Route::view('Insert.Parents', 'livewire.ShowFormParents')->name('Parents');

        /* Teachers*/
        Route::prefix('Teachers')->group(function () {
            Route::get('/TeachersTableview', 'App\Http\Controllers\Teachers\TeachersController@index')->name('TeachersTableview');
            Route::get('/createTeachers', 'App\Http\Controllers\Teachers\TeachersController@create')->name('createTeachers');
            Route::post('/Teachers.store', 'App\Http\Controllers\Teachers\TeachersController@store')->name('Teachers.store');
            Route::get('/Teachers.Edit/{id}', 'App\Http\Controllers\Teachers\TeachersController@edit')->name('Teachers.Edit');
            Route::post('/Teachers.update', 'App\Http\Controllers\Teachers\TeachersController@update')->name('Teachers.update');
            Route::post('/Teachers.destroy', 'App\Http\Controllers\Teachers\TeachersController@destroy')->name('Teachers.destroy');
        });
        /* Teachers*/


        /* Students*/
        Route::prefix('Students')->group(function () {
            Route::get('/create', 'App\Http\Controllers\Students\StudentsController@index')->name('create');
            Route::post('/Sudents.store', 'App\Http\Controllers\Students\StudentsController@store')->name('Sudents.store');
            Route::get('/StudentsTableview', 'App\Http\Controllers\Students\StudentsController@create')->name('StudentsTableview');
            Route::get('/Students.edit/{id}', 'App\Http\Controllers\Students\StudentsController@edit')->name('Students.edit');
            Route::patch('/Students.update', 'App\Http\Controllers\Students\StudentsController@update')->name('Students.update');
            Route::post('/Students.destroy', 'App\Http\Controllers\Students\StudentsController@destroy')->name('Students.destroy');
            Route::get('/Students.show/{id}', 'App\Http\Controllers\Students\StudentsController@show')->name('Students.show');
            Route::get('/view_Students/{id}', [StudentsController::class, 'view_Students'])->name('view_Students');
            Route::get('/Invoice_Accoints/{id}', [StudentsController::class, 'print_Fatora'])->name('Invoice_Accoints');
            Route::get('/Invoice_Receipt/{id}', [ReceiptController::class, 'print_Fatora_Receipt'])->name('Invoice_Receipt');
            Route::get('/Accounts_Statment/{id}', [StudentsController::class, 'accounts_Statment'])->name('Accounts_Statment');
            Route::post('/Students.Upbloade_Attachment', 'App\Http\Controllers\Students\StudentsController@Upbloade_Attachment')->name('Students.Upbloade_Attachment');
            Route::post('/Students.Delete_attachment', 'App\Http\Controllers\Students\StudentsController@Delete_attachment')->name('Students.Delete_attachment');
            Route::get('/search', 'App\Http\Controllers\Students\StudentsController@search');
        });
        Route::get('/search', 'App\Http\Controllers\Students\StudentsController@search')->name('search');
        /* Download attachement */
        Route::get('/Students.Download_attachement/{studentsname}/{filename}', [StudentsController::class, 'Download_attachement'])->name('Students.Download_attachement');
        /* Students*/

        /*StudentsAvarege */
        Route::resource('/StudentsAvarege', Students_averageController::class);
        Route::get('/StudentsMarkshow/{id}',  [Students_averageController::class, 'mark_show'])->name('StudentsMarkshow.mark_show');
        Route::get('/AvaregeMarks.Create/{id}', [Students_averageController::class, 'avaregeMarksCreate'])->name('avaregeMarksCreate');
        Route::post('/Calculatesmesterfirst', [Students_averageController::class, 'avaregeMarksfirstStore'])->name('Calculatesmesterfirst.store');

        Route::resource('/Academicyear', AcademicYearController::class);
        Route::prefix('Promotions')->group(function () {
            Route::get('Promotions.index', 'App\Http\Controllers\Students\PromotionsController@index')->name('Promotions.index');
            Route::post('Promotions.store', 'App\Http\Controllers\Students\PromotionsController@store')->name('Promotions.store');
            Route::get('Promotions.create', 'App\Http\Controllers\Students\PromotionsController@create')->name('Promotions.create');
            Route::post('Promotions.destroy', 'App\Http\Controllers\Students\PromotionsController@destroy')->name('Promotions.destroy');

            Route::get('Promotions.Graudated', 'App\Http\Controllers\Students\GraudatedController@create')->name('Promotions.Graudated');
            Route::post('Promotions.softDeletes', 'App\Http\Controllers\Students\GraudatedController@softDeletes')->name('Promotions.softDeletes');
            Route::get('Promotions.Graduate', 'App\Http\Controllers\Students\GraudatedController@Graduate')->name('Promotions.Graduate');

            Route::post('Promotions.ReturnData', 'App\Http\Controllers\Students\GraudatedController@ReturnData')->name('Promotions.ReturnData');

            Route::post('Promotions.DestroyGarduate', 'App\Http\Controllers\Students\GraudatedController@destroy')->name('Promotions.DestroyGarduate');
        });


        /* Fees */

        Route::prefix('Fees')->group(function () {
            Route::get('Fees.index', 'App\Http\Controllers\Fees\FeeController@index')->name('Fees.index');
            Route::get('Fees.Create', 'App\Http\Controllers\Fees\FeeController@Create')->name('Fees.Create');
            Route::post('Fees.store', 'App\Http\Controllers\Fees\FeeController@store')->name('Fees.store');
            Route::get('Fees.edit/{id}', 'App\Http\Controllers\Fees\FeeController@edit')->name('Fees.edit');
            Route::post('Fees.update', 'App\Http\Controllers\Fees\FeeController@update')->name('Fees.update');
            Route::post('Fees.destroy', 'App\Http\Controllers\Fees\FeeController@destroy')->name('Fees.destroy');
        });

        Route::prefix('FeeIncoices')->group(function () {
            Route::get('FeesInvoices.index', 'App\Http\Controllers\Fees\FeeInvoicesController@index')->name('FeesInvoices.index');
            Route::get('FeeIncoices.show/{id}', 'App\Http\Controllers\Fees\FeeInvoicesController@show')->name('FeeIncoices.show');
            Route::post('FeeIncoices.store', 'App\Http\Controllers\Fees\FeeInvoicesController@store')->name('FeeIncoices.store');
            Route::get('FeeIncoices.edit/{id}', [FeeInvoicesController::class, 'edit'])->name('FeeIncoices.edit');
            Route::post('FeeIncoices.update', [FeeInvoicesController::class, 'update'])->name('FeeIncoices.update');
            Route::post('FeeIncoices.destroy', [FeeInvoicesController::class, 'destroy'])->name('FeeIncoices.destroy');
            Route::get('Fees.read',  [FeeInvoicesController::class, 'readAllNotify'])->name('Fees.read');
        });

        /* Receipt */
        Route::resource('ReceiptStudent', ReceiptController::class);

        /* ProccessingFeesStudent */
        Route::resource('ProccessingFeesStudent', ProccesingFeesController::class);

        //المدفوعات الي طلعت من الصندوق
        /* Payment */
        Route::resource('Payment', PaymentController::class);

        /* Attendance */
        Route::resource('Attendance', AttendanceController::class);

        /* Subject */
        Route::resource('Subject', SubjectController::class);

        /* Exams */
        Route::resource('Exams', ExamsController::class);
        Route::get('print_exams/{id}', [ExamsController::class, 'print_Exams'])->name('print_exams');


        /* Quizzes */
        Route::resource('Quizzes', QuizzesController::class);


        /* Questions */
        Route::resource('Questions', QuestionsController::class);

        /* Zoom */
        Route::resource('Zoom', ZoomController::class);
        Route::get('/indirect.create', [ZoomController::class, 'indirectCreate'])->name('indirect.create');
        Route::POST('/indirect.store', [ZoomController::class, 'indirectStore'])->name('indirect.store');

        /* Library */
        Route::resource('Library', LibraryController::class);
        Route::get('/downloadAttachment/{filename}', [LibraryController::class, 'download'])->name('downloadAttachment');

        Route::resource('settings', SettingController::class);

        Route::resource('SMS', SMSStudentsController::class);

        Route::resource('Events', EventsController::class);

        Route::resource('News', NewsController::class);

        Route::get('/showNews', [App\Http\Controllers\HomeController::class, 'showNews'])->name('News');
        Route::get('/showContent/{id}', [App\Http\Controllers\HomeController::class, 'showContent'])->name('News.Content');
        Route::get('/About', [App\Http\Controllers\HomeController::class, 'about'])->name('About.school');
    }

);
