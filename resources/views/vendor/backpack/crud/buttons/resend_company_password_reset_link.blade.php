@if(isset($entry))
	@if(!$entry->is_default)
        @if($entry->owner)
		<a href="{{ url($crud->route.'/'.$entry->getKey().'/resend-password-reset-link') }}" class="btn btn-sm btn-primary"  title="Resend password reset link again.">
            <i class="la la-btn la-envelope"></i>
		</a>
        @else
        <a href="javscript:void;" class="btn btn-sm btn-primary" disabled="disabled"  title="Please complete company registration process.">
            <i class="la la-btn la-envelope"></i>
		</a>
        @endif
	@endif
@endif
