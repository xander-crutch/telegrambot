<?php

namespace Database\Seeders;

use App\Models\SettingsBot as SBModel;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class SettingsbotSeeder extends Seeder
{
	use DisableForeignKeys, TruncateTable;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$this->disableForeignKeys();
		SBModel::destroy('streams_area');
		SBModel::create([
			'key' => 'streams_area',
			'value' => '<b>Red Dead Redemption 2</b> Ближайший стрим 15 марта в 19.15 https://www.youtube.com/channel/UC9jQ9wXfwgIBHyNla0erO4Q',
		]);

		$this->enableForeignKeys();
	}
}
