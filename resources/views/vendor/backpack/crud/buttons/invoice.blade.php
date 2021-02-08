@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/invoice') }}" class="btn btn-sm btn-primary"  title="View invoice">
		<i class="la la-btn la-file"></i>
	</a>
@endif
