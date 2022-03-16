<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsBot extends Model
{
	use HasFactory;

	protected $table = 'settings_bot';
	protected $primaryKey = 'key';
	public $timestamps = false;

	public static function getSetting($key)
	{
		return self::query()->select('value')->where("key", '=', $key)->first()->value;
	}

	public static function updateSetting($key, $value)
	{
		self::where('key', $key)->update(['value' => $value]);
	}
}
