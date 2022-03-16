<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SebastianBergmann\CodeCoverage\Report\PHP;
use Telegram\Bot\Laravel\Facades\Telegram;

class Rates extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'command:rates';
	protected $url = 'https://www.cbr-xml-daily.ru/daily_json.js';
	protected $rates = [];

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Exchange rates';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->rates = [
			"EUR", "USD", "CNY"
		];
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle($chat_id)
	{
		$out = '';
		$req = \Http::get($this->url);
		$src = json_decode($req->body(), true);
		foreach ($src['Valute'] as $value) {
			if (in_array($value['CharCode'], ["EUR", "USD", "CNY"])) {
				$out .= '<i>' . $value['Name'] . '</i> <b>' . $value['Value'] . '₽</b> ';
				if ($value['Previous'] > $value['Value']) {
					$s = $value['Previous'] - $value['Value'];
					$out .= "↓ <b>" . $s . "₽ </b>";
				} else {
					$s = $value['Value'] - $value['Previous'];
					$out .= "↑ <b>" . $s . "₽ </b>";
				}
				$out .= PHP_EOL;
			}
		}

		$response = Telegram::sendMessage([
			'chat_id' => env("TELEGRAM_GROUP"),
			'text' => $out,
			//'reply_markup' => $reply_markup
		]);

		$messageId = $response->getMessageId();
		$this->info($messageId);
		$response = Telegram::sendMessage([
			'chat_id' => ($chat_id) ? $chat_id : env("TELEGRAM_GROUP_CHANNEL"),
			'text' => $out,
		]);
		$messageId = $response->getMessageId();
		$this->info($messageId);
	}
}
