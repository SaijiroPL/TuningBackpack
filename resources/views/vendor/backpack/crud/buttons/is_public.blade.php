@if(isset($entry))
	@php
		if($entry->is_public == 1){
	@endphp
		<a href="{{ url($crud->route.'/'.$entry->getKey().'/company-account-type') }}" target="" class="btn btn-sm btn-danger"  title="Public">
			<i class="la la-btn la-users"></i>
		</a>
	@php
		}else{
	@endphp
		<a href="{{ url($crud->route.'/'.$entry->getKey().'/company-account-type') }}" target="" class="btn btn-sm btn-danger"  title="Private">
			<i class="la la-btn la-lock"></i>
		</a>
	@php
		}
	@endphp
@endif
