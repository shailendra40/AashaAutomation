<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Actions\Logout;

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

Route::get('/', function () {
    // return view('welcome');
    return view('admin.index');
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



// Auth::routes();
// User Routes
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// First staff route using RESTful conventions
Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index');
Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
// Route::post('staff', [StaffController::class, 'store'])->name('admin.staff.store');
Route::post('/admin/staff', [StaffController::class, 'store'])->name('admin.staff.store');

Route::get('/admin/staff/{id}', [StaffController::class, 'show'])->name('admin.staff.show');
Route::get('/admin/staff/{id}/edit', [StaffController::class, 'edit'])->name('admin.staff.edit');
Route::put('/admin/staff/{id}', [StaffController::class, 'update'])->name('admin.staff.update');
Route::delete('/admin/staff/{id}', [StaffController::class, 'destroy'])->name('admin.staff.destroy');

Route::middleware(['checkRole'])->group(function () {
    // Your other protected routes...

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');

//     Route::middleware('permission:create-staff|edit-staff|delete-staff')->group(function () {
//     // Your routes or controller actions here
// });



// Route::post('/logout', function () {
//     auth()->logout();
//     return redirect()->route('login');
// })->name('logout');




    Route::middleware('can:permission_name')->group(function () {
    });

});
