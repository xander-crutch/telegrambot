<?php

use Illuminate\Http\Request;
use App\Http\Controllers\TelegramController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'AAFn7Qo2UC95TDTFfWc28tkOpD8eEpP51qE/webhook', 'as' => 'webhook.'], function () {
	Route::post('/', [TelegramController::class, 'index']);
});

/*
	Route::get('/start', function () {
		$keyboard = [
			['7', '8', '9'],
			['4', '5', '6'],
			['1', '2', '3'],
			['0']
		];

		$reply_markup = Keyboard::make([
			'keyboard' => $keyboard,
			'resize_keyboard' => true,
			'one_time_keyboard' => true
		]);

		$response = Telegram::sendMessage([
			'chat_id' => env("TELEGRAM_ME"),
			'text' => 'Hello World2',
			//'reply_markup' => $reply_markup
		]);

		$messageId = $response->getMessageId();
		dd($messageId);
	});

});*/

