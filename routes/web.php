<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BootController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MenuController::class, 'index'])->name('menu.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get("/admin", [AdminController::class, 'index'])->name('admin');
    Route::get("/admin/jurusan", [AdminController::class, 'jurusan'])->name('admin.jurusan');
    Route::get("/admin/kelas", [AdminController::class, 'kelas'])->name('admin.kelas');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('registerStore');
Route::post('/login', [AuthController::class, 'authLogin'])->name('authLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::get('jurusan', [JurusanController::class, 'create'])->name('jurusan');
    Route::post('jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::delete('jurusan', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::delete('kelas', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('boot', [BootController::class, 'index'])->name('boot.index');
    Route::get('boot/create', [BootController::class, 'create'])->name('boot.create');
    Route::post('boot', [BootController::class, 'store'])->name('boot.store');
    Route::get('boot/{boot}', [BootController::class, 'show'])->name('boot.show');
    Route::get('boot/{boot}/edit', [BootController::class, 'edit'])->name('boot.edit');
    Route::put('boot/{boot}', [BootController::class, 'update'])->name('boot.update');
    Route::delete('boot/{boot}', [BootController::class, 'destroy'])->name('boot.delete');
    Route::get('boot/{boot}/accept', [BootController::class, 'accept'])->name('boot.accept');
});

Route::middleware(['auth'])->group(function () {
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
    Route::delete('menu/{menu}', [MenuController::class, 'destroy'])->name('menu.delete');
});
