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
		SBModel::destroy('bufera_time', 'bufera_channels_id', 'bufera_users_id', 'bufera_urls', 'streams_area');
		SBModel::create([
			'key' => 'bufera_time',
			'value' => '1200',
		]);
		SBModel::create([
			'key' => 'bufera_channels_id',
			'value' => '-650360667',
		]);
		SBModel::create([
			'key' => 'bufera_users_id',
			'value' => '747003454',
		]);
		SBModel::create([
			'key' => 'streams_area',
			'value' => '<b>Red Dead Redemption 2</b> Ближайший стрим 15 марта в 19.15 https://www.youtube.com/channel/UC9jQ9wXfwgIBHyNla0erO4Q',
		]);
		SBModel::create([
			'key' => 'bufera_urls',
			'value' => 'https://bufera.club/bolshie-siski/13505-bolshie-stojachie-siski-92-foto.html,
https://bufera.club/pochitat/11265-popki-znamenityh-pornoaktris-75-foto.html,
https://bufera.club/golye-krasotki/8550-devochki-golye-vid-snizu-79-foto.html,
https://bufera.club/golye-krasotki/8507-golye-s-shirokim-tazom-78-foto.html,
https://bufera.club/golye-krasotki/8549-seksualnye-golye-monashki-80-foto.html,
https://bufera.club/golye-krasotki/8506-golye-zhopy-v-blizi-73-foto.html,
https://bufera.club/golye-krasotki/8505-golye-zheny-hotjaschie-seksa-80-foto.html,
https://bufera.club/golye-krasotki/8548-golye-devchonki-stojaschie-rakom-71-foto.html,
https://bufera.club/golye-krasotki/8503-golye-zhenskie-zadnicy-rakom-74-foto.html,
https://bufera.club/golye-krasotki/8544-golye-krashennye-devushki-74-foto.html,
https://bufera.club/golye-krasotki/8539-golye-devushki-ljubiteli-75-foto.html,
https://bufera.club/golye-krasotki/8534-golye-devushki-razdvigajuschie-jagodicy-73-foto.html,
https://bufera.club/golye-krasotki/8528-golye-melkie-devushki-68-foto.html,
https://bufera.club/pochitat/11253-porno-s-celujuschimisja-v-sperme-73-foto.html,
https://bufera.club/pochitat/11250-krasivoe-klassicheskoe-porno-76-foto.html,
https://bufera.club/pochitat/11266-porno-s-titjastymi-zhenschinami-75-foto.html,
https://bufera.club/pochitat/11249-krasivye-soski-v-porno-73-foto.html,
https://bufera.club/pochitat/11265-popki-znamenityh-pornoaktris-75-foto.html,
https://bufera.club/pochitat/11248-porno-s-krasivymi-hudenkimi-devushkami-72-foto.html,
https://bufera.club/pochitat/11264-porno-s-ochkastymi-76-foto.html,
https://bufera.club/pochitat/11263-ogromnye-lesbjanki-v-porno-75-foto.html,
https://bufera.club/pochitat/11247-malenkaja-ostraja-grud-v-porno-76-foto.html,
https://bufera.club/pochitat/11262-porno-s-sochnymi-blondami-76-foto.html,
https://bufera.club/pochitat/11242-miks-porno-74-foto.html,
https://bufera.club/bolshie-siski/13475-telki-s-bolshimi-siskami-88-foto.html,
https://bufera.club/bolshie-siski/13467-golye-telki-s-bolshimi-siskami-88-foto.html,
https://bufera.club/bolshie-siski/13530-bolshie-siski-zhmzh-92-foto.html,
https://bufera.club/bolshie-siski/13529-bolshie-visjachie-siski-92-foto.html,
https://bufera.club/bolshie-siski/13518-porno-mzhm-bolshie-siski-95-foto.html,
https://bufera.club/bolshie-siski/13418-porno-bolshie-siski-v-bane-95-foto.html,
https://bufera.club/bolshie-siski/13425-golye-devushki-s-bolshimi-siskami-i-popami-94-foto.html,
https://bufera.club/bolshie-siski/13516-zhenschiny-s-bolshimi-siskami-86-foto.html,
https://bufera.club/bolshie-siski/13510-golye-baby-s-bolshimi-siskami-88-foto.html,
https://bufera.club/bolshie-siski/13505-bolshie-stojachie-siski-92-foto.html,
https://bufera.club/bolshie-siski/13410-golye-devushki-s-bolshimi-siskami-i-zhopami-93-foto.html,
https://bufera.club/bolshie-siski/13501-minet-s-bolshimi-siskami-93-foto.html,
https://bufera.club/bolshie-siski/13409-bolshie-siski-aziatok-88-foto.html,
https://bufera.club/bolshie-siski/13496-bolshie-siski-chastnoe-94-foto.html,
https://bufera.club/bolshie-siski/13493-jerotika-s-bolshimi-siskami-92-foto.html,
https://bufera.club/bolshie-siski/13492-chastnoe-porno-bolshie-siski-94-foto.html,
https://bufera.club/bolshie-siski/13491-bolshie-siski-ot-pervogo-lica-91-foto.html,
https://bufera.club/bolshie-siski/13489-bolshie-siski-v-chulkah-92-foto.html',
		]);

		$this->enableForeignKeys();
	}
}
