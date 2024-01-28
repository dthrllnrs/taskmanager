<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\LandingPage;
use App\Livewire\Tasks\Tasks;
use App\Livewire\Users\Login;
use App\Livewire\Users\Register;

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

Route::get('/', LandingPage::class);
Route::get('tasks', Tasks::class)->middleware('auth')->name('tasks');
Route::get('login', Login::class)->middleware('guest')->name('login');
Route::get('register', Register::class)->middleware('guest')->name('register');
