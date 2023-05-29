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

use App\Http\Controllers\Parents\SonsController;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ],
    function () { //..
        //==============================dashboard============================
        Route::get('/parent/home' , function () {
            $sons = Student::where('parent_id' , Auth::user()->id)->get();
            return view('pages.Parents.dashboard.master' , compact('sons'));
        })->name('Home.Parent');

        Route::group(['namespace' => 'Parents/dashboard'], function () {
            Route::get('Sons' , [SonsController::class , 'index'])->name('Sons.index');
            Route::get('Sons/results/{id}' , [SonsController::class , 'results'])->name('Sons.results');
            Route::get('Sons/resultsExam/{id}' , [SonsController::class , 'showYear'])->name('Sons.resultsExam');
            Route::get('Attendances' , [SonsController::class , 'attendances'])->name('Sons.attendances');
            Route::post('Attendances/Search' , [SonsController::class , 'attendancesSearch'])->name('Sons.attendances.search');
            Route::get('Fees' , [SonsController::class , 'Fees'])->name('Sons.Fees');
            Route::get('Receipt/{id}' , [SonsController::class , 'receipt'])->name('Sons.receipt');
            Route::get('profile/parent' , [SonsController::class , 'profile'])->name('Profile.show.paren');
            Route::post('profile/Update/{id}' , [SonsController::class , 'profileUpdate'])->name('profile.update.parent');
            Route::get('Sons/accounts_Statment/{id}' , [SonsController::class , 'accounts_Statment'])->name('Sons.accounts_Statment');

        });
        
    }   

);
