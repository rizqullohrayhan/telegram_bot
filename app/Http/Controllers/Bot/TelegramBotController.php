<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramBotController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function sendMessage(Request $request)
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $chatId = '6326766093';

        $message = "📢 *Pengajuan Izin Baru*\n\n"
                . "👤 Nama: *Rizqulloh Rayhan Ferdiansyah*\n"
                . "📅 Tanggal: {31 05 2025} s.d. {31 05 2025}\n"
                . "📝 Alasan: {testing}";

        $reponse = $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);

        return redirect()->back();
    }
}
