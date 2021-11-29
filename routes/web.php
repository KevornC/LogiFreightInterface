<?php

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
    return view('landing');
})->name('landing');
Auth::routes();


Route::middleware(['Active'])->group(function(){

Route::get('/MainOffice', [\App\Http\Controllers\HomeController::class, 'main'])->name('Mainhome');
Route::get('/LocalOffice', [\App\Http\Controllers\HomeController::class, 'local'])->name('Localhome');
Route::get('/DashBoard', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/LogiFreight/Member/QuickAlert', [\App\Http\Controllers\memberController::class, 'quickalert'])->name('quickalert');
Route::get('/LogiFreight/Member/warehouse', [\App\Http\Controllers\memberController::class, 'warehouse'])->name('warehouse');
Route::get('/LogiFreight/Member/Invoice', [\App\Http\Controllers\memberController::class, 'memberInvoice'])->name('memberInvoice');
Route::get('/LogiFreight/Member/transit', [\App\Http\Controllers\memberController::class, 'transit'])->name('transit');
Route::get('/LogiFreight/Member/pickup', [\App\Http\Controllers\memberController::class, 'pickup'])->name('mpickup');
Route::get('/LogiFreight/Member/track', [\App\Http\Controllers\memberController::class, 'track'])->name('track');


Route::get('/LogiFreight/MainOffice/Package/Status', [\App\Http\Controllers\Main::class, 'checkStatus'])->name('checkStatus');
Route::get('/LogiFreight/MainOffice/Member/Search', [\App\Http\Controllers\Main::class, 'mSearch'])->name('mSearch');
Route::get('/LogiFreight/MainOffice/Package/Search', [\App\Http\Controllers\Main::class, 'pSearch'])->name('pSearch');
Route::get('/LogiFreight/MainOffice/Dashboard', [\App\Http\Controllers\Main::class, 'index'])->name('mdashboard');
Route::get('/LogiFreight/MainOffice/Member', [\App\Http\Controllers\Main::class, 'addM'])->name('addM');
Route::get('/LogiFreight/MainOffice/Package', [\App\Http\Controllers\Main::class, 'addP'])->name('addP');
Route::get('/LogiFreight/MainOffice/Package/Search-to-Ship', [\App\Http\Controllers\Main::class, 'ShipP'])->name('ShipP');


Route::get('/LogiFreight/LocalOffice/Package/Pickup/Search', [\App\Http\Controllers\Local::class, 'pickup'])->name('pickup');
Route::get('/LogiFreight/LocalOffice/Package/Pickup/List', [\App\Http\Controllers\Local::class, 'list'])->name('list');
Route::get('/LogiFreight/LocalOffice/Package/QuickAlerts/List', [\App\Http\Controllers\Local::class, 'qa'])->name('qa');
Route::get('/LogiFreight/LocalOffice/Invoice', [\App\Http\Controllers\Local::class, 'invoice'])->name('invoice');

Route::get('/logout', [\App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
});
