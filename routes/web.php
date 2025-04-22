<?php

use App\Exports\SalesExport;
use App\Exports\ProductsExport;
use App\Exports\UsersExport;
use App\Exports\MembersExport;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SalesExportController;
use App\Http\Controllers\ProductsExportController;
use App\Http\Controllers\UsersExportController;
use App\Http\Controllers\MembersExportController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['authenticate'])->group(function () {
    // Home Route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Product Route
    Route::resource('products', ProductController::class);

    // Sale Route
    Route::get('/sales/{id}/invoice', [SaleController::class, 'showInvoice'])->name('sales.invoice');
    Route::resource('sales', SaleController::class);

    // Member Route
    Route::resource('members', MemberController::class);
    Route::get('/members/export', [MembersExportController::class, 'export'])->name('members.export');
        Route::get('/members/export/excel', function () {
            return Excel::download(new MembersExport, 'members.xlsx');
        })->name('members.export');

    // Profile Routes (Accessible by both admin and user)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    // Superadmin Route
    Route::middleware(['superadmin'])->group(function () {
        // User Route
        Route::resource('user', UserController::class);
        Route::get('/users/export', [UsersExportController::class, 'export'])->name('users.export');
        Route::get('/users/export/excel', function () {
            return Excel::download(new UsersExport, 'users.xlsx');
        })->name('users.export');

        Route::get('/sales/export', [SalesExportController::class, 'export'])->name('sales.export');
        Route::get('/sales/export/excel', function () {
            return Excel::download(new SalesExport, 'sales.xlsx');
        })->name('sales.export');

        // Product Route
        Route::put('/products/{id}/update-stock', [ProductController::class, 'updateStock'])->name('products.updateStock');
        Route::get('/products/export', [ProductExportController::class, 'export'])->name('product.export');
        Route::get('/products/export/excel', function () {
            return Excel::download(new ProductsExport, 'product.xlsx');
        })->name('product.export');
    });

    // User Route
    Route::middleware(['user'])->group(function () {
        Route::post('/confirm-sale', [SaleController::class, 'confirmationStore'])->name('sales.confirmationStore');
        // Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // If you want regular users to see products
    });
});
