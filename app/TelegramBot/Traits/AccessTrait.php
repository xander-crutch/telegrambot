<?php

namespace App\TelegramBot\Traits;

use App\Models\SettingsBot as SB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Telegram\Bot\FileUpload\InputFile as TelegramInputfile;

trait AccessTrait
{

	public function accessCommand($channel_id, $user_id)
	{
		if ($channel_id == env('TELEGRAM_GROUP_CHANNEL')) return false;
		if ($this->accessUser($user_id) || $this->accessChannel($channel_id)) {
			return true;
		}
		return false;
	}

	public function accessChannel($channel_id)
	{
		$access_channels = SB::getSetting('bufera_channels_id');
		$access_channels = explode(',', $access_channels);
		if (in_array($channel_id, $access_channels)) {
			return true;
		}
		return false;
	}

	public function accessUser($user_id)
	{
		$access_users = SB::getSetting('bufera_users_id');
		$access_users = explode(',', $access_users);
		if (in_array($user_id, $access_users)) {
			return true;
		}
		return false;
	}

	public function accessTime($time, $item)
	{
		if ($item == env('TELEGRAM_ME')) return true;
		if (!Cache::store('redis')->get($item)) {
			Cache::store('redis')->put($item, $time, SB::getSetting('bufera_time'));
			return true;
		} else {
			return false;
		}
	}
}
