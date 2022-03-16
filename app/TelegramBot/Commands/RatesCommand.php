<?php

namespace App\TramxBot\Commands;

use App\Models\SettingsBot as SB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Illuminate\Http\Request;

class RatesCommand extends Command
{
	/**
	 * @var string Command Name
	 */
	protected $name = "rates";
	protected $url = 'https://www.cbr-xml-daily.ru/daily_json.js';
	/**
	 * @var string Command Description
	 */
	protected $description = "Exchange rates|Курсы валют";

	/**
	 * @inheritdoc
	 */
	public function handle()
	{
		$out = '';
		$src = $this->_cache();
		$out = 'Курс на ' . date('d-m-Y h:i:s', strtotime($src['Timestamp'])) . ' ~' . $src['c'] . PHP_EOL;
		foreach ($src['Valute'] as $value) {
			if (in_array($value['CharCode'], ["EUR", "USD", "CNY", "BYN", "UAH"])) {
				$out .= '<i><u>' . $value['Name'] . '</u></i> <b>' . round($value['Value'], 2) . '₽</b> ';
				if ($value['Previous'] > $value['Value']) {
					$s = $value['Previous'] - $value['Value'];
					$arrow = "↓";
				} else {
					$s = $value['Value'] - $value['Previous'];
					$arrow = "↑";
				}
				$out .= $arrow . "<b>" . round($s, 2) . "₽ </b>" . PHP_EOL;
			}
		}
		$this->replyWithMessage(['text' => $out, 'parse_mode' => 'html']);
	}

	private function _cache()
	{
		$src = Cache::store('redis')->get($this->name);
		if (!$src) {
			$req = Http::get($this->url);
			$src = json_decode($req->body(), true);
			Cache::store('redis')->put($this->name, $src, 18000);
		} else {
			$src['c'] = 'c';
		}
		return $src;
	}
}
