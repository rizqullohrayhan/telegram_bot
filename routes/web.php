<?php

use App\Http\Controllers\Bot\TelegramBotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::post('sendMessage', [TelegramBotController::class, 'sendMessage'])->name('sendMessage');

Route::get('/run-migrate', function () {
    if (request('token') !== env('DEPLOY_TOKEN')) {
        abort(403);
    }

    Artisan::call('migrate', ['--force' => true]);

    return 'Migrasi berhasil dijalankan!';
});
