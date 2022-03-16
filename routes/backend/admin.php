<?php

use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
	->name('dashboard')
	->breadcrumbs(function (Trail $trail) {
		$trail->push(__('Home'), route('admin.dashboard'));
	});
Route::get('settings', [\App\Http\Controllers\Backend\SettingsController::class, 'index'])
	->name('settings')
	->breadcrumbs(function (Trail $trail) {
		$trail->push(__('settings'), route('admin.settings'));
	});
