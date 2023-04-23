<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\UserControllerD;
use App\Http\Controllers\dashboard\CategorieController;
use App\Http\Controllers\dashboard\ArtisanController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\CommandController;
use App\Http\Controllers\dashboard\ServicesController;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\EditComponent;
use App\Http\Livewire\UserAnnonceComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ServiceController::class,'index'])->name('Home');
// route pour allez à la page about 
Route::get('/about', function () {
    return view('about.about-us');
});
// route pour allez à la page contact 
Route::get('/contact', function () {
    return view('contact.contact');
});

// route pour depose un travail 
Route::get('/post', [ServiceController::class,'create'])->middleware(['auth','isUser','isArtisan']);
// add new service 
Route::post('/post', [ServiceController::class,'store'])->name('service.post');
// route pour allez au user dashbord (user annances , parameters) 
Route::get('/dashbord', function () {
    return view('user.dashbord');
})->middleware(['auth','isUser'])->name('user.dashbord');



// route pour allez à la page de service spicifie

Route::get('/service/{service:title}',[ServiceController::class,'show'])->name('service.show');
Route::get('/service/edit/{service:title}',[ServiceController::class,'edit'])->name('service.edit');
Route::put('/service/edit/{service:title}',[EditComponent::class,'update'])->name('service.update');
Route::delete('/service/delete/{service:title}',[UserAnnonceComponent::class,'destroy'])->name('service.delete');

// route for search 
Route::get('/search',function(){
    return view('search');
})->name('search');

// route pour allez au admin dashbord (gestion des utilisteurs , categories , services ) 
// -------------- login -------------------
Route::get('/admin/login', [AdminController::class,'index'])->name('admin.login');
Route::post('/admin/login/verifier', [AdminController::class,'login'])->name('admin.login.verifier');
// -------------- dashbord -------------------

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class,'show'])->name('admin.dashboard');
    Route::post('adminUsers/destroy', [UserControllerD::class, 'destroy'])->name('adminUsers.destroy');
    Route::post('adminArtisan/destroy', [ArtisanController::class, 'destroy'])->name('adminUsers.destroy');
    Route::post('adminService/destroy', [ServicesController::class, 'destroy'])->name('adminService.destroy');
    
    Route::resources([
        'adminUsers' => UserControllerD::class,
        'adminCategorie' => CategorieController::class,
        'adminArtisan' => ArtisanController::class,
        'adminSetting' => SettingController::class,
        'adminCommand' => CommandController::class,
        'adminService' => ServicesController::class,
        'adminProfile' => ProfileController::class,
    ]);
    Route::post('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');

});


// switch to saller
Route::post('/switch', [UserController::class,'switch'])->name('to_artisan');

Auth::routes();


