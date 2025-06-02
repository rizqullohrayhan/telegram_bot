<?php

namespace App\Http\Controllers\Bot;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramWebhookController extends Controller
{
    public function handle()
    {
        // Ini akan menjalankan semua command yang sudah didaftarkan
        Telegram::commandsHandler(true); // true jika webhook (bukan polling)
    }
}
