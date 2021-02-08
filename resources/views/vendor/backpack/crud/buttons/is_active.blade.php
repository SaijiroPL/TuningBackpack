@if(isset($entry))
	@php $companyUser = $entry->owner; @endphp
	@if(isset($companyUser->is_active))
		@if( $companyUser->is_active== 1)
			<a href="{{ url($crud->route.'/'.$entry->getKey().'/account-activate') }}" target="" class="btn btn-sm btn-primary"  title="Active">
				<i class="la la-btn la-thumbs-up"></i>
			</a>
		@else
			<a href="{{ url($crud->route.'/'.$entry->getKey().'/account-activate') }}" target="" class="btn btn-sm btn-primary"  title="Deactive">
				<i class="la la-btn la-thumbs-down"></i>
			</a>
		@endif
	@endif
@endif
