<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
	public function index()
	{
		$update = Telegram::commandsHandler(true);
		Log::debug($update);
		return response()->json([true, 200]);
	}
}
