<?php

use App\Http\Controllers\CatalogController;
use App\Http\Middleware\AddStudentHeaders;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/'.config('lab2.route_prefix'));

Route::prefix(config('lab2.route_prefix'))
    ->name('catalog.')
    ->middleware(AddStudentHeaders::class)
    ->controller(CatalogController::class)
    ->group(function (): void {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('about');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{slug}/edit', 'edit')->name('edit');
        Route::patch('/{slug}', 'update')->name('update');
        Route::get('/{slug}/confirm-delete', 'confirmDelete')->name('confirm-delete');
        Route::delete('/{slug}', 'destroy')->name('destroy');
        Route::get('/{slug}', 'show')->name('show');
    });
