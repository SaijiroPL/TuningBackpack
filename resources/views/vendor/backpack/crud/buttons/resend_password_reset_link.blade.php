@if(isset($entry))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/resend-password-reset-link') }}" class="btn btn-sm btn-primary"  title="Resend password reset link again.">
		<i class="la la-btn la-envelope"></i>
	</a>
@endif
