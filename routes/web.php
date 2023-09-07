<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create-supplier',[SupplierController::class, 'create_supplier'])->middleware(['auth','verified'])->name('create-supplier');
Route::post('/insert-supplier',[SupplierController::class, 'store'])->middleware(['auth','verified'])->name('insert-supplier');
Route::post('/update-supplier',[SupplierController::class, 'update'])->middleware(['auth','verified'])->name('update-supplier');
Route::delete('/supplier-delete/{id}',[SupplierController::class, 'destroy'])->middleware(['auth','verified'])->name('supplier-delete');
Route::get('/supplier-list',[SupplierController::class, 'suppliers_record'])->middleware(['auth','verified'])->name('supplier-list');

//Category
Route::get('/create-category',[CategoryController::class, 'create'])->middleware(['auth','verified'])->name('create-category');
Route::post('/insert-category',[CategoryController::class, 'store'])->middleware(['auth','verified'])->name('insert-category');
Route::post('/update-category',[CategoryController::class, 'update'])->middleware(['auth','verified'])->name('update-category');
Route::delete('/category-delete/{id}',[CategoryController::class, 'destroy'])->middleware(['auth','verified'])->name('category-delete');
Route::get('/category-list',[CategoryController::class, 'category_records'])->middleware(['auth','verified'])->name('category-list');


require __DIR__.'/auth.php';

