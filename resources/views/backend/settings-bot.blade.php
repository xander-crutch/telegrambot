@extends('backend.layouts.app')

@section('title', __('Settings'))

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			@livewire('backend.settings-bot')
		</x-slot>
	</x-backend.card>
@endsection
