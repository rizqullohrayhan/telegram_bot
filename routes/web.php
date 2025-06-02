<?php

use App\Http\Controllers\Bot\TelegramBotController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Api;

Route::get('/', function () {
    return view('test');
});

Route::post('sendMessage', [TelegramBotController::class, 'sendMessage'])->name('sendMessage');

Route::post('/bot/webhook', [TelegramWebhookController::class, 'handle']);

Route::get('/run-migrate', function () {
    if (request('token') !== env('DEPLOY_TOKEN')) {
        abort(403);
    }

    Artisan::call('migrate', ['--force' => true]);

    return 'Migrasi berhasil dijalankan!';
});

Route::get('/setwebhook', function () {
    $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

    $telegram->setWebhook([
        'url' => 'https://v3421083.mhs.d3tiuns.com/hris/bot/webhook',
    ]);

    return 'Webhook set!';
});
