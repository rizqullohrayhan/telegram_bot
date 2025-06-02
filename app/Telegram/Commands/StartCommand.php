<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Memulai interaksi dengan bot';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->replyWithMessage([
            'text' => "👋 Hai, selamat datang di Bot Cuti!\n\nGunakan /cuti untuk memulai pengajuan cuti."
        ]);
    }
}
