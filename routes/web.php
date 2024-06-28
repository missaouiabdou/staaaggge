<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\agcontroller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\dataagens;

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
    return view ('auth.login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('diplomes',\App\Http\Controllers\diplomecontroller::class);
    Route::get('/search',[\App\Http\Controllers\agcontroller::class, 'search']);
    Route::post('/save-document', 'DocumentController@store');
    Route::get('/documents', [DocumentController::class, 'index']);
    Route::resource('conges', \App\Http\Controllers\CongesController::class);

    Route::get('agens/export/', [\App\Http\Controllers\agcontroller::class, 'export']);


    Route::resource('agens',agcontroller::class);
    Route::get('/search_diplomes',[\App\Http\Controllers\diplomecontroller::class, 'search_diplomes']);
    Route::get('/search',[CongesController::class, 'search'])->name('conges.search');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addconger/{agen}', [CongesController::class, 'addconger']);
    Route::post('/generate-pdf', [\App\Http\Controllers\PdfController::class, 'generate'])->name('generate.pdf');

});


require __DIR__.'/auth.php';
