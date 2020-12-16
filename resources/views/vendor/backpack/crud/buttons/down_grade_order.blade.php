@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/down') }}" class="btn btn-sm btn-danger"  title="Move {{ $entry->label }} down">
		<i class="la la-btn la-arrow-down"></i>
	</a>
@endif
