<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TouristSpotController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RankController;

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

Route::get('/',[HomeController::class,'homepage']);

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/


route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/news', [NewsController::class, 'index']);
Route::get('/rank', [RankController::class, 'index']);

//แหล่งท่องเที่ยว
Route::get('/touristspot', [TouristSpotController::class, 'index'])->name('touristspot');
Route::get('/touristspot/{province?}', [TouristSpotController::class, 'showByProvince'])->name('touristspot.province');



//admin
Route::get('/addnews', [NewsController::class, 'addnews']);

//home เพิ่มแหล่งท่องเที่ยว
Route::post('/adminhome', [TouristSpotController::class, 'store'])->name('adminhome.store');

// สร้าง route เพิ่มข่าว
Route::get('/addnews', [NewsController::class, 'create'])->name('news.create');
Route::post('/addnews', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
