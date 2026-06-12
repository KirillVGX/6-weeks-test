<?php

declare(strict_types=1);

use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactFormController::class, 'show'])->name('contact.show');

Route::post('/contact', [ContactFormController::class, 'submit'])
    ->middleware('throttle:10,1')
    ->name('contact.submit');
