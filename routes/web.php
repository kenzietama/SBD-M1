<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

Route::get('trash', [AdminController::class, 'trash'])->name('admin.trash');
Route::post('deletepermanent/{id}', [AdminController::class, 'deletePermanent'])->name('admin.deletepermanent');
Route::post('undoall', [AdminController::class, 'undoAll'])->name('admin.undoall');
Route::post('undo/{id}', [AdminController::class, 'undo'])->name('admin.undo');
