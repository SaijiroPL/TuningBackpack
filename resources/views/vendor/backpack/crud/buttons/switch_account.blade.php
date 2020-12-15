@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/switch-account') }}" target="_blank" class="btn btn-sm btn-danger"  title="Login as this customer">
		<i class="la la-btn la-user"></i>
	</a>
@endif
