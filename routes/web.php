<?php

use App\Providers\Filament;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Filament\Panel;
use App\Providers\Filament\AdminPanelProvider;

use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

//default or main page
Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//route navigation bar

//public accessS
Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/aboutus', function () {
    return view('aboutUs');
})->name('aboutus');

Route::get('/motorcycles', function () {
    return view('motorcycles');
})->name('motorcycles');


Route::get('/transactions', function () {
    return view('transactions');
})->middleware(['auth', 'verified'])->name('transactions');

// Route::get('/admin', function () {
//     $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();
//     if($isAdmin){
//         $panel = new Panel(); // Membuat objek Panel
//         return app()->call('App\Providers\Filament\AdminPanelProvider@panel', ['panel' => $panel]);

//     }else{
//         return redirect('/');
//     }
// })->middleware(['auth', 'verified'])->name('admin');

Route::get('/admin',function(){
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();

    if($isAdmin){
        // admincontrollee
        // , [AdminController::class, 'index']
        return view('admin');
    }else{
        return redirect('/');
    }
})->middleware(['auth', 'verified'])->name('admin');



// Route::get('/admin', [AdminController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('admin');

