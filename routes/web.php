<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

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
//Route::get('/users/{user}', [UserController::class, 'show']);

route::resource('/roles',RoleController::class)->middleware(['auth']);
route::resource('/users',UserController::class)->middleware(['auth']);
route::resource('/permissions',PermissionController::class)->middleware(['auth']);

route::get('/permissions/{permission}/assign', [PermissionController::class,'assign'])->name('permissions.assign');//to assign roles
route::post('/permissions/{permission}/', [PermissionController::class,'sync'])->name('permissions.sync');//to assign roles (post)

route::get('/roles/{role}/assign', [RoleController::class,'assign'])->name('roles.assign');//to assign Permission
route::post('/roles/{role}/', [RoleController::class,'sync'])->name('roles.sync');//to assign permission (post)


route::get('/users/{user}/assignrole',[UserController::class, 'assignrole'])->name('users.assignrole');//assign users to role
route::post('/users/{user}/role',[UserController::class, 'syncrole'])->name('users.syncrole');//assign users to role

route::get('/users/{user}/assignpermission',[UserController::class, 'assignpermission'])->name('users.assignpermission');//assign users to role
route::post('/users/{user}/permission',[UserController::class, 'syncpermission'])->name('users.syncpermission');//assign users to role

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
