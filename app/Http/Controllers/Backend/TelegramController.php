<?php

namespace App\Http\Controllers\Backend;

use App\TelegramUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Telegram;

class TelegramController extends Controller
{
    public function webhook() {

        $telegram = Telegram::getWebhookUpdates()['message'];
        if(!TelegramUser::find($telegram['form']['id'])) {
            TelegramUser::create(json_decode($telegram['from'], true));
        }
        Telegram::commandsHandler(true);
    }
}
