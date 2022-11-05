<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\Section2Controller;
use Carbon\Carbon;
use App\Models\Section1;
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

Route::get('/asd', function () {
	// return Section1::first()->created_at;

	// return Carbon::now();
    return Carbon::parse(Section1::first()->created_at)->format('M,d Y h:i a');
});

// Route::get('/dropzone', [DropzoneController::class,'dropzone'])->name('dropzone') ;
// Route::post('/dropzone-store', [DropzoneController::class,'dropzoneStore'])->name('dropzone.store') ;



Route::get('/', [Section1Controller::class, 'index']);
Route::post('update-order', [Section1Controller::class, 'updatesection1']);
Route::post('update-section1/{id}', [Section1Controller::class, 'updatesection1']);
Route::post('store-section1', [Section1Controller::class, 'storesection1']);

Route::get('delete-section1/{id}', [Section1Controller::class, 'deletesection1']);



Route::post('store-section2', [Section2Controller::class, 'storesection2']);
Route::post('update-section2/{id}', [Section2Controller::class, 'updatesection2']);
Route::get('delete-section2/{id}', [Section2Controller::class, 'deletesection2']);