<?php

use App\Http\Controllers\BorrowController;
use App\Http\Controllers\InventoryController;
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
    return view('index');
});

//made group for all inventory route
Route::prefix('inventory')->group(function(){

    //return view inventory index through Inventory controller class, function index
    Route::get('/',[InventoryController::class, 'index'])->name('inventory.index');

    //return view inventory add index through Inventory controller class, function addIndex
    Route::get('/add',[InventoryController::class, 'addIndex'])->name('inventory.add.index');

    //run add inventory  through Inventory controller class, function add
    Route::post('/add',[InventoryController::class, 'add'])->name('inventory.add');

    //return view inventory update index through Inventory controller class, function updateIndex
    Route::get('/update/{id}',[InventoryController::class, 'updateIndex'])->name('inventory.update.index');

    //run update inventory  through Inventory controller class, function update
    Route::post('/update/{id}',[InventoryController::class, 'update'])->name('inventory.update');

    //run delete inventory  through Inventory controller class, function delete
    Route::post('/delete',[InventoryController::class, 'delete'])->name('inventory.delete');
});



























Route::get('/borrow',[BorrowController::class,'list'])->name('list');
Route::get('/borrow/{id}',[BorrowController::class,'index'])->name('borrow.index');
Route::post('/borrow/{id}',[BorrowController::class,'borrow'])->name('borrow');
Route::get('/returned',[BorrowController::class,'returnedIndex'])->name('returned.index');
Route::get('/returned/{id}',[BorrowController::class,'returned'])->name('returned');

