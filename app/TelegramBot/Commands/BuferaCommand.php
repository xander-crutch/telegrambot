<?php

namespace App\TelegramBot\Commands;

use App\TelegramBot\Traits\AccessTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\Http;
use \Telegram\Bot\FileUpload\InputFile as TelegramInputfile;
use App\Models\SettingsBot as SB;

class BuferaCommand extends Command
{
	use AccessTrait;

	/**
	 * @var string Command Name
	 */
	protected $name = "bufera";
	protected $url = [];
	protected $images = [];

	/**
	 * @var string Command Description
	 */
	protected $description = "big boobs|Большие сиськи";

	/**
	 * @inheritdoc
	 */
	public function handle()
	{
		$group = json_decode($this->getUpdate(), true);
		if (isset($group['message'])) {
			$this->replyWithChatAction(['action' => Actions::TYPING]);
			if ($this->accessChannel($group['message']['chat']['id']) || $this->accessUser($group['message']['from']['id'])) {
				//$this->accessTime($group['message']['date'], $group['message']['chat']['id']) ||
				if ($this->accessTime($group['message']['date'], $group['message']['from']['id'])) {
					$this->getPhoto();
				} else {
					$this->replyWithMessage(['text' => 'Следующая фотка через ' . (SB::getSetting('bufera_time') / 60) . ' минут']);
				}
			} else {
				$this->replyWithMessage(['text' => 'Access Denied']);
			}
		} else {
			$this->replyWithMessage(['text' => 'Error :(']);
		}
	}

	private function getPhoto()
	{
		$urls = explode(",", SB::getSetting('bufera_urls'));
		foreach ($urls as $url) {
			$this->url[] = trim($url);
		}
		shuffle($this->url);
		$src = Http::get($this->url[0]);
		$crawler = new Crawler($src);
		$crawler->filter('.fill > div > img')->each(function ($node) {
			$this->images[] = "https://bufera.club" . $node->attr('data-src');
		});
		if (is_array($this->images)) {
			shuffle($this->images);
			$this->replyWithPhoto(['photo' => TelegramInputFile::create($this->images[0])]);
		} else {
			$this->replyWithMessage(['text' => 'Фотки закончились']);
		}
	}
}
