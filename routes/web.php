<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/dashboard',[IncidentController::class,'dashboard'])->name('dashboard');
    Route::get('/incident',[IncidentController::class,'index'])->name('incident');
    Route::post('/incident',[IncidentController::class,'create'])->name('create-incident');
    Route::get('/incident/delete/{id}',[IncidentController::class,'delete'])->name('delete-incident');
    Route::get('/incident/show/{id}',[IncidentController::class,'show'])->name('show-incident');
    Route::get('/incident/update/{id}',[IncidentController::class,'edit'])->name('update-incident');
});
