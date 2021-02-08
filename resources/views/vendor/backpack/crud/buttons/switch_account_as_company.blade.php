@if(isset($entry))
	@if(!$entry->is_default)
        @if($entry->owner)
		<a href="{{ url($entry->domain_link.'/admin/company/'.$entry->getKey().'/switch-account') }}" target="_blank" class="btn btn-sm btn-primary"  title="Login as this company">
			<i class="la la-btn la-user"></i>
		</a>
        @else
        <a href="javascript:;" target="_blank" class="btn btn-sm btn-primary" disabled="disabled" title="Please complete company registration process.">
			<i class="la la-btn la-user"></i>
		</a>
        @endif
	@endif
@endif
