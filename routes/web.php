<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\kependudukancontroller;
use App\Http\Controllers\SessionController;


Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/kependudukan');
    }
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');


Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/kependudukan');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput($request->only('email'));
})->middleware('guest')->name('login.post');


Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Berhasil logout');
})->middleware('auth')->name('logout');


Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('/index', 'App\Http\Controllers\kependudukancontroller@index');
    Route::get('/kependudukan', 'App\Http\Controllers\kependudukancontroller@tampil');
    Route::get('kependudukan/cetak_pdf', 'App\Http\Controllers\kependudukancontroller@cetak_pdf');
    Route::get('/kependudukan/export_excel', 'App\Http\Controllers\kependudukancontroller@export_excel');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/tambah', 'App\Http\Controllers\kependudukancontroller@tambah');
    Route::post('/kependudukan/store', 'App\Http\Controllers\kependudukancontroller@simpan');
    Route::get('/kependudukan/ubah/{nim}', [kependudukancontroller::class,'ubah']);
    Route::post('/kependudukan/edit', [kependudukancontroller::class,'edit']);
    Route::get('/hapus/{nik}', [kependudukancontroller::class,'hapus']);
});


Route::get('/session/tampil', 'App\Http\Controllers\SessionController@tampilkanSession');
Route::get('/session/buat', 'App\Http\Controllers\SessionController@buatSession');
Route::get('/session/hapus', 'App\Http\Controllers\SessionController@hapusSession');
Route::get('/session/home', 'App\Http\Controllers\SessionController@homeSession');