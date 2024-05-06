<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Media;
use App\Http\Livewire\Admin\Post;
use App\Http\Livewire\Auth\ForgetPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Livewire\Admin\Users;

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
Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/forget-password', ForgetPassword::class)->name('forget-password');
Route::post('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/post', Post::class)->name('post');
    Route::get('/media', Media::class)->name('media');
    Route::get('/users', Users::class)->name('users');
});
