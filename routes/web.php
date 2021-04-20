<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use App\Models\User;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use App\Http\Controllers\PostController;

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

// Route::get('/home', [HomeController::class, 'home'])->name('home');
// Route::view('welcome', 'home');

Route::get('welcome/{name}',[HomeController::class,'welcome']);

// Route::get('home', [HomeController::class, 'login'])->name('home');

Route::get('index', [HomeController::class, 'index'])->name('index')->middleware('checktoken');

Route::get('create',[HomeController::class, 'create'])->name('create');

Route::post('login', [LoginController::class, 'login'])->middleware(['checkrole'])->name('post.login');

Route::get('check', [LoginController::class, 'create'])->middleware(['checklogin', 'checkrole'])->name('check');

Route::get('/', function(){
    $user = DB::table('users')->get();
    dd($user);
    return view('welcome');
});

Route::get('template', [HomeController::class, 'template'])->name('template');


// Bài tập Blade Tempalte

Route::get('portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

Route::get('contact', function () {
    return view('contact', ['name' =>'CONTACT US']);
});

Route::get('about', function () {
    return view('about', ['name'=>'ABOUT']);
});

Route::get('team', function () {
    return view('team',['name'=>'TEAM']);
});

Route::get('services', function () {
    return view('services',['name'=>'SERVICES']);
});

Route::get('123', function () {
    $user = Post::select()->where('id', 2)->join('Users')->where('name','user1')->get();
    dd($user);
});

Route::get('111', function() {
    //  User::withoutTrashed()->findOrFail(1);
    // return ' xoa thanh cong';

    $user = User::query()->email()->toSql();

    dd($user);
});


Route::resource('posts', PostController::class);

Route::get('phone', function()
{
    $user = User::with('phone')->findOrFail(4);
    dd($user->toArray());
});

Route::get('phone1', function()
{
    $user = User::with('phone')->findOrFail(5);

    $user->phone()->create(['phone'=>'0954534343']);

    dd($user->toArray());
});

Route::get('phone1', function()
{
    $user = User::with('phone')->findOrFail(5);

    $user->phone()->create(['phone'=>'0954534343']);

    dd($user->toArray());
});

Route::get('baipost', function()
{
    $user = User::with('posts')->findOrFail(2);

    $post = Post::with('user')->findOrFail(3);

    dd($post->toArray());
});


