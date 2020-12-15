@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/file-services') }}" class="btn btn-sm btn-danger"  title="Show the file services for this customer">
        <i class="la la-btn la-file-code-o"></i>
    </a>
@endif
