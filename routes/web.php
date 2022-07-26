<?php


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::get('/usuarios-cadastrados', function () {
    $users = DB::table('users')->get();

    echo nl2br("USUÁRIOS CADASTRADOS: \n\n");

    foreach($users as $user){
        echo nl2br($user->name." | ".$user->email."\n");
    }
    // return view('usuarios',['usuarios' => $users]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
