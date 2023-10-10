<?php

use App\Http\Controllers\Admin\{
    AdminController,
    UserController,
    ACL\PermissionController,
    ACL\RoleController,
    AgencyController,
    ChangelogController,
    ClientController,
    ClientFunnelController,
    PropertyController,
    StepController,
};

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        /** Chart home */
        Route::get('/chart', [AdminController::class, 'chart'])->name('home.chart');

        /** Users */
        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::resource('users', UserController::class)->except('show');

        /** Agencies */
        Route::resource('agencies', AgencyController::class)->except('show');

        /** Clients */
        Route::get('/clients/timeline/{id}', [ClientController::class, 'timeline']);
        Route::resource('clients', ClientController::class)->except('show');

        /** Clients Funnel */
        Route::post('clients-funnel-updateKanban', [ClientFunnelController::class, 'updateKanban'])->name('clients.updateKanban');

        Route::resource('clients-funnel', ClientFunnelController::class);

        /** Properties */
        Route::resource('properties', PropertyController::class);

        /** Steps */
        Route::resource('steps', StepController::class);

        /**
         * ACL
         * */
        /** Permissions */
        Route::resource('permission', PermissionController::class);

        /** Roles */
        Route::get('role/{role}/permission', [RoleController::class, 'permissions'])->name('role.permissions');
        Route::put('role/{role}/permission/sync', [RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
        Route::resource('role', RoleController::class);

        /** Changelog */
        Route::get('/changelog', [ChangelogController::class, 'index'])->name('changelog');
    });
});

/** Web */
Route::group(['middleware' => ['auth']], function () {
    /** Home */
    // Route::get('/', [SiteController::class, 'index'])->name('home');
    Route::get('/', function () {
        return redirect('admin');
    });
});

Auth::routes([
    'register' => false,
]);
