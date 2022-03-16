<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SettingsBot;

/**
 * Class HomeController.
 */
class HomeController
{
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function index()
	{
		/*$bufera_time = SettingsBot::getSetting('bufera_time');

		dd($bufera_time);*/
		return view('frontend.index');
	}
}
