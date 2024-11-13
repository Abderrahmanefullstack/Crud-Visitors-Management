<?php
use App\Http\Controllers\VisiteurController;
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
    return view('welcome');
});
Route::get('/visiteur',[VisiteurController::class,'index'])->name('visiteur.index');
Route::get('/visiteur/create',[VisiteurController::class,'create'])->name('visiteur.create');
Route::post('/visiteur',[VisiteurController::class,'store'])->name('visiteur.store');
Route::get('/visiteur/{visiteur}/edit',[VisiteurController::class,'edit'])->name('visiteur.edit');
Route::put('/visiteur/{visiteur}/update',[VisiteurController::class,'update'])->name('visiteur.update');
Route::delete('/visiteur/{visiteur}/destroy',[VisiteurController::class,'destroy'])->name('visiteur.destroy');