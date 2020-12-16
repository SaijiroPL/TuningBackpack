@if(isset($entry))
	@if(($user->company_id == $entry->company_id) && ($entry->is_default == 1))
		<a class="btn btn-sm btn-danger" disabled="disabled" href="javascript:void(0)" title="Default credit group">
			<i class="la la-btn la-check-circle"></i>
		</a>
	@else
		<a href="{{ url($crud->route.'/'.$entry->getKey().'/default') }}" class="btn btn-sm btn-danger"  title="Mark as default credit price type">
			<i class="la la-btn la-check-circle"></i>
		</a>
	@endif
@endif
