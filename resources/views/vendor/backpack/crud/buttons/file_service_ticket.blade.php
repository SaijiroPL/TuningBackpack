@if(isset($entry))
    @if(isset($entry->tickets))
            <a href="{{ backpack_url('tickets/'.$entry->tickets->id.'/edit') }}" class="btn btn-sm btn-primary" title="Tickets">
                <i class="la la-btn la-comment"></i>
            </a>
        @else
            <a href="{{ backpack_url('file-service/'.$entry->id.'/create-ticket') }}" class="btn btn-sm btn-primary" title="Tickets">
                <i class="la la-btn la-comment"></i>
            </a>
    @endif

@endif


