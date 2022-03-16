<div>
	<div>
		@if (session()->has('message'))
			<div class="alert alert-success">
				{{ session('message') }}
			</div>
		@endif
	</div>

	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{__("Bot")}}</a>
			<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{__("Bufera")}}</a>
			<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">{{__("Streams")}}</a>
		</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			<div class="mb-3 mt-3">
				Основные Настройки Бота
			</div>
		</div>
		<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			<div class="mb-3 mt-3">
				<label for="bufera_time" class="form-label">{{__('Bufera Time')}}</label>
				<textarea class="form-control" id="bufera_time" rows="3" wire:model.defer="bufera_time"></textarea>
			</div>
			<div class="mb-3">
				<label for="bufera_users_id" class="form-label">{{__('Bufera Users Id')}}</label>
				<textarea class="form-control" id="bufera_users_id" rows="3" wire:model.defer="bufera_users_id"></textarea>
			</div>
			<div class="mb-3">
				<label for="bufera_channels_id" class="form-label">{{__('Bufera Channels Id')}}</label>
				<textarea class="form-control" id="bufera_channels_id" rows="3" wire:model.defer="bufera_channels_id"></textarea>
			</div>
			<div class="mb-3">
				<label for="bufera_urls" class="form-label">{{__('Bufera Channels Id')}}</label>
				<textarea class="form-control" id="bufera_urls" rows="12" wire:model.defer="bufera_urls"></textarea>
			</div>

		</div>
		<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
			<div class="mb-3 mt-3">
				<label for="streams_area" class="form-label">{{__('Streams Time')}}</label>
				<textarea class="form-control" id="streams_area" rows="16" wire:model.defer="streams_area"></textarea>
			</div>
		</div>
	</div>
	<div class="mb-3">
		<div class="content-fluid">
			<button class="btn btn-lg btn-success" wire:click="save">{{__("Save")}}</button>
			<a href="{{route("admin.settings")}}" class="btn btn-lg btn-danger">{{__("Cancel")}}</a>
		</div>
	</div>
</div>
