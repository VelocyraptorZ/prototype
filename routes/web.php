<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManifestController;
use App\Http\Controllers\ShippingController;

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
    return redirect(route('dashboard'));
    return view('welcome');
})->middleware('auth');

Route::controller(CompanyController::class)->middleware('auth')->group(function () {
    Route::get('/company', 'index')->name('company.index');
    Route::get('/company/create', 'create')->name('company.create');
    Route::post('/company', 'store')->name('company.store');
    Route::get('/company/{id}', 'show');
    Route::get('/company/edit/{company}', 'edit')->name('company.edit');
    Route::patch('/company/{company}', 'update')->name('company.update');
    Route::delete('/company/delete/{company}', 'destroy')->name('company.delete');
});

Route::controller(ItemController::class)->middleware('auth')->group(function () {
    Route::get('/item', 'index')->name('item.index');
    Route::get('/item/form', 'form')->name('item.form');
    Route::delete('/item/delete/{item}', 'destroy')->name('item.delete');
});

Route::controller(DocumentController::class)->middleware('auth')->group(function () {
    Route::get('/document/{type}', 'index')->name('document.index');
    Route::get('/document/{type}/create', 'create')->name('document.create');
    Route::post('/document', 'store')->name('document.store');
    // Route::get('/document/{id}', 'show');
    Route::get('/document/view/{document}', 'show')->name('document.show');
    Route::get('/document/edit/{document}', 'edit')->name('document.edit');
    Route::get('/document/replicate/{document}', 'replicate')->name('document.replicate');
    Route::post('/document/next/{document}', 'next')->name('document.next');
    Route::get('/document/mail/{document}', 'mail')->name('document.mail');
    Route::get('/document/pdf/{document}', 'pdf')->name('document.pdf');
    Route::patch('/document/{document}', 'update')->name('document.update');
    Route::delete('/document/delete/{document}', 'destroy')->name('document.delete');
});

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/user/store', 'store')->name('user.store');
    Route::get('/user/form', 'form')->name('user.form');
    Route::delete('/user/delete/{user}', 'destroy')->name('user.delete');
});

Route::controller(ManifestController::class)->middleware('auth')->group(function () {
    Route::get('/manifest', 'index')->name('manifest.index');
    Route::get('/manifest/show/{manifest}', 'show')->name('manifest.show');
    Route::get('/manifest/print/{manifest}', 'print')->name('manifest.print');
    Route::get('/manifest/close/{manifest}', 'close')->name('manifest.close');
    Route::delete('/manifest/delete/{manifest}', 'destroy')->name('manifest.delete');
});

Route::controller(ShippingController::class)->middleware('auth')->group(function () {
    Route::get('/shipping/modes', 'modes')->name('shipping.modes');
    Route::get('/shipping/providers', 'providers')->name('shipping.providers');
    Route::get('/shipping/awbs', 'awbs')->name('shipping.awbs');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::view('/role', 'role.manage')->name('role.index');
    Route::view('/notifications', 'notifications')->name('notifications');
});
