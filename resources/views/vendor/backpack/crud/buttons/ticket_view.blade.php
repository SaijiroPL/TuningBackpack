@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-sm btn-primary"  title="Show the contents of the ticket">
		<i class="fa fa-btn fa-search"></i>
	</a>
@endif
