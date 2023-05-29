<?php



/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => 'auth:teacher,web'] , function(){
    Route::get('/get_Classes', [AjaxController::class , 'get_Classes'] )->name('get_Classes');
    Route::get('/get_Section',  [AjaxController::class , 'get_Section'] )->name('get_Section');
});
