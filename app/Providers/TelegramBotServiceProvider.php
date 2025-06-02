<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Telegram\Bot\Api;

class TelegramBotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        // Registrasi semua command
        $telegram->addCommands([
            \App\Telegram\Commands\StartCommand::class,
        ]);
    }
}
