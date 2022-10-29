<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

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

Route::get('/dashboard', function () {
    if(auth()->user()->role == 'pasien'){
        return redirect()->route('profile.show');
    }
    $userCount = User::where('role','pasien')->count();
    return view('dashboard', compact('userCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('pasien', PasienController::class)->middleware(['auth', 'verified']);
Route::get('profile', function () {
    return view('profile.show');
})->middleware(['auth', 'verified'])->name('profile.show');
require __DIR__.'/auth.php';
