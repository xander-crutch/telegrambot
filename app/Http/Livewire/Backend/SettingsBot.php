<?php

namespace App\Http\Livewire\Backend;

use App\Models\SettingsBot as SB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SettingsBot extends Component
{
	public $bufera_time;
	public $bufera_channels_id;
	public $bufera_users_id;
	public $bufera_urls;
	public $streams_area;

	public function render()
	{
		$this->data();
		return view('livewire.backend.settings-bot');
	}

	public function data()
	{
		$this->bufera_channels_id = SB::getSetting('bufera_channels_id');
		$this->bufera_users_id = SB::getSetting('bufera_users_id');
		$this->bufera_time = SB::getSetting('bufera_time');
		$this->bufera_urls = SB::getSetting('bufera_urls');
		$this->streams_area = SB::getSetting('streams_area');
	}

	public function save()
	{
		SB::updateSetting("bufera_users_id", $this->bufera_users_id);
		SB::updateSetting("bufera_time", $this->bufera_time);
		SB::updateSetting("bufera_channels_id", $this->bufera_channels_id);
		SB::updateSetting("bufera_urls", $this->bufera_urls);
		SB::updateSetting("streams_area", $this->streams_area);
		session()->flash('message', __('Settings successfully updated.'));
	}

}
