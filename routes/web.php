<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EditRegionController;
use App\Http\Controllers\EditTerritoryController;
use App\Http\Controllers\EditZoneController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Models\zone;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)
        ->name('dashboard');
        // Route::get('/view',[OrderController::class, 'view']);
        Route::get('/export',[OrderController::class, 'export']);
        Route::get('/pdfexprt',[OrderController::class, 'pdfexprt']);
        Route::resources([
            '/invoice' => InvoiceController::class,
            '/invoiceexport' => InvoiceController::class,
            '/order' => OrderController::class,
            '/ordersearch' => SearchController::class,
        ]);
        Route::get('/view/{order}', [OrderController::class, 'show'])->name('view.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', AdminController::class)
        ->name('admin.dashboard');
    Route::get('/livesearch',[SearchController::class, 'livesearch'])->name('admin.liveserch');
    Route::get('/livesearch2',[SearchController::class, 'livesearch2'])->name('admin.liveserch');

    Route::get('/admin/allzone', [EditZoneController::class, 'index'])->name('admin.edit.zone');
    Route::get('/admin/allregion', [EditRegionController::class, 'index'])->name('allregion');
    Route::get('/admin/allterritory', [EditTerritoryController::class, 'index'])->name('allterritory');


    Route::get('/admin/zone/{zone}', [EditZoneController::class, 'edit'])->name('zone.edit');
    Route::get('/admin/region/{region}', [EditRegionController::class, 'edit'])->name('region.edit');
    Route::get('/admin/Territory/{Territory}', [EditTerritoryController::class, 'edit'])->name('Territory.edit');

    Route::put('/admin/zoneupdate/{zone}', [EditZoneController::class, 'update'])->name('zoneupdate.update');
    Route::put('/admin/regionupdate/{region}', [EditRegionController::class, 'update'])->name('regionupdate.update');
    Route::put('/admin/territoryupdate/{territory}', [EditTerritoryController::class, 'update'])->name('territoryupdate.update');

    Route::delete('/admin/zonedelete/{zone}', [EditZoneController::class, 'delete'])->name('zonedelete.delete');
    Route::delete('/admin/regiondelete/{region}', [EditRegionController::class, 'delete'])->name('regiondelete.delete');
    Route::delete('/admin/territorydelete/{Territory}', [EditTerritoryController::class, 'delete'])->name('territorydelete.delete');

    Route::resources([
        '/admin/addzone' => ZoneController::class,
         '/admin/addregion' => RegionController::class,
        '/admin/addterritory' => TerritoryController::class,
        '/admin/addusers' => UserController::class,
        '/admin/addsku' => SkuController::class,
    ]);
});
Route::middleware(['auth', 'role:distributor'])->group(function () {
    Route::get('/distributor/dashboard', DistributorController::class)
        ->name('distributor.dashboard');

        Route::resources([
            '/distributor/order' => OrderController::class,
        ]);

});
require __DIR__ . '/auth.php';