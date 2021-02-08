@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/up') }}" class="btn btn-sm btn-primary"  title="Move {{ $entry->label }} up">
		<i class="la la-btn la-arrow-up"></i>
	</a>
@endif
