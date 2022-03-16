<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class SettingsController
{
	public function index()
	{
		return view('backend.settings-bot');
	}
}
