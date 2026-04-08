<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Api\ContentController;


Route::get('/', [WebsiteController::class, 'home'])->name('home');


Route::fallback([WebsiteController::class, 'notFound'])->name('not-found');
