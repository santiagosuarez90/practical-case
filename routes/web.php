<?php

use App\Http\Controllers\CaseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/clients', function () {
    return view('dashboard');
})->middleware(['auth'])->name('clients');

Route::get('/cases', [CaseController::class, 'index'])->middleware(['auth'])->name('cases');
Route::get('/cases-create', [CaseController::class, 'create'])->middleware(['auth'])->name('cases-create');
Route::post('/cases-create', [CaseController::class, 'new'])->middleware(['auth']);



require __DIR__.'/auth.php';
