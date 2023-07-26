<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicesPagesController;
use App\Http\Controllers\PortfoliosPagesController;
use App\Http\Controllers\AboutsPagesController;
use App\Http\Controllers\TeamsPagesController;
use App\Http\Controllers\contactFormController;
use App\Http\Controllers\ContactController;

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

// __pages__

Route::get('/',[PagesController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/dashboard',[PagesController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/main',[MainPagesController::class, 'index'])->name('admin.main');
    Route::put('/main',[MainPagesController::class, 'update'])->name('admin.main.update');

    //services route
    Route::get('/services/create',[ServicesPagesController::class, 'create'])->name('admin.services.create');
    Route::post('/services/create',[ServicesPagesController::class, 'store'])->name('admin.services.create');
    Route::get('/services/list',[ServicesPagesController::class, 'list'])->name('admin.services.list');
    Route::get('/services/edit/{id}',[ServicesPagesController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/update/{id}',[ServicesPagesController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/destroy/{id}',[ServicesPagesController::class, 'destroy'])->name('admin.services.destroy');

    // portfolio route
    Route::get('/portfolios/create',[PortfoliosPagesController::class, 'create'])->name('admin.portfolios.create');
    Route::put('/portfolios/create',[PortfoliosPagesController::class, 'store'])->name('admin.portfolios.create');
    Route::get('/portfolios/list',[PortfoliosPagesController::class, 'list'])->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}',[PortfoliosPagesController::class, 'edit'])->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}',[PortfoliosPagesController::class, 'update'])->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}',[PortfoliosPagesController::class, 'destroy'])->name('admin.portfolios.destroy');


     // about route
     Route::get('/abouts/create',[AboutsPagesController::class, 'create'])->name('admin.abouts.create');
     Route::put('/abouts/store',[AboutsPagesController::class, 'store'])->name('admin.abouts.store');
     Route::get('/abouts/list',[AboutsPagesController::class, 'list'])->name('admin.abouts.list');
     Route::get('/abouts/edit/{id}',[AboutsPagesController::class, 'edit'])->name('admin.abouts.edit');
     Route::post('/abouts/update/{id}',[AboutsPagesController::class, 'update'])->name('admin.abouts.update');
     Route::delete('/abouts/destroy/{id}',[AboutsPagesController::class, 'destroy'])->name('admin.abouts.destroy');


     // about team
     Route::get('/teams/create',[TeamsPagesController::class, 'create'])->name('admin.teams.create');
     Route::put('/teams/store',[TeamsPagesController::class, 'store'])->name('admin.teams.store');
     Route::get('/teams/list',[TeamsPagesController::class, 'list'])->name('admin.teams.list');
     Route::get('/teams/edit/{id}',[TeamsPagesController::class, 'edit'])->name('admin.teams.edit');
     Route::post('/teams/update/{id}',[TeamsPagesController::class, 'update'])->name('admin.teams.update');
     Route::delete('/teams/destroy/{id}',[TeamsPagesController::class, 'destroy'])->name('admin.teams.destroy');

});


Route::get('/contact', [ContactController::class,'index']);
Route::post('/contact/store', [ContactController::class,'store'])->name('contact.store');














Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
