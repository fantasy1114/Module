<?php

use Illuminate\Support\Facades\Route;
use GoodPayments\Datatrans\Http\Controllers\DatatransController;
use GoodPayments\Datatrans\Http\Controllers\DatatransCategoryController;
use GoodPayments\Datatrans\Http\Controllers\DatatransServiceController;
use GoodPayments\Datatrans\Http\Controllers\DatatransLoginController;
use GoodPayments\Datatrans\Http\Controllers\DatatransOrderController;
use GoodPayments\Datatrans\Http\Controllers\DatatransMerchantController;
use GoodPayments\Datatrans\Http\Controllers\DatatransUserController;

Route::middleware('web')->group(function () {

    Route::get('datatrans-service/{id}', [DatatransController::class, 'index'])->name('datatrans.index');
    Route::post('datatrans-service-create', [DatatransController::class, 'create'])->name('datatrans.create');
    Route::post('datatrans-service-transaction', [DatatransController::class, 'transactionget'])->name('datatrans.transaction.get');
    Route::get('datatrans-service-pay', [DatatransController::class, 'pay'])->name('datatrans.pay');
	Route::get('datatrans-service-error', [DatatransController::class, 'error'])->name('datatrans.error');
	Route::get('datatrans-service-cancel', [DatatransController::class, 'cancel'])->name('datatrans.cancel');

    Route::middleware('auth')->group(function () {
        Route::get('datatrans-category', [DatatransCategoryController::class, 'index'])->name('datatrans.category.index');
        Route::post('datatrans-category', [DatatransCategoryController::class, 'create'])->name('datatrans.category.create');
        Route::post('datatrans-category-update/{id}', [DatatransCategoryController::class, 'update'])->name('datatrans.category.update');
        Route::get('datatrans-category-delete/{id}', [DatatransCategoryController::class, 'delete'])->name('datatrans.category.delete');

        Route::get('datatrans-service-list', [DatatransServiceController::class, 'index'])->name('datatrans.service.index');
        Route::post('datatrans-service-list', [DatatransServiceController::class, 'create'])->name('datatrans.service.create');
        Route::post('datatrans-service-update/{id}', [DatatransServiceController::class, 'update'])->name('datatrans.service.update');
        Route::get('datatrans-service-delete/{id}', [DatatransServiceController::class, 'delete'])->name('datatrans.service.delete');

        Route::get('datatrans-order', [DatatransOrderController::class, 'index'])->name('datatrans.order.index');
        Route::post('datatrans-order', [DatatransOrderController::class, 'create'])->name('datatrans.order.create');
        Route::post('datatrans-order-update/{id}', [DatatransOrderController::class, 'update'])->name('datatrans.order.update');
        Route::get('datatrans-order-delete/{id}', [DatatransOrderController::class, 'delete'])->name('datatrans.order.delete');

        Route::get('datatrans-merchant', [DatatransMerchantController::class, 'index'])->name('datatrans.merchant.index');
        Route::post('datatrans-merchant', [DatatransMerchantController::class, 'create'])->name('datatrans.merchant.create');
        Route::post('datatrans-merchant-update/{id}', [DatatransMerchantController::class, 'update'])->name('datatrans.merchant.update');
        Route::get('datatrans-merchant-delete/{id}', [DatatransMerchantController::class, 'delete'])->name('datatrans.merchant.delete');

        Route::get('datatrans-user', [DatatransUserController::class, 'index'])->name('datatrans.user.index');
        Route::post('datatrans-user', [DatatransUserController::class, 'create'])->name('datatrans.user.create');
        Route::post('datatrans-user-update/{id}', [DatatransUserController::class, 'update'])->name('datatrans.user.update');
        Route::get('datatrans-user-delete/{id}', [DatatransUserController::class, 'delete'])->name('datatrans.user.delete');

        Route::get('home', [DatatransOrderController::class, 'index'])->name('home');
        
        
    });

    Route::get('login', [DatatransLoginController::class, 'index'])->name('login');
    Route::post('custom-login', [DatatransLoginController::class, 'customLogin'])->name('login.custom'); 
    Route::get('registration', [DatatransLoginController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [DatatransLoginController::class, 'customRegistration'])->name('register.custom'); 
    Route::get('signout', [DatatransLoginController::class, 'signOut'])->name('signout');
});

