@if(isset($entry))
	@if($entry->status == 'Cancelled')
		<a href="javascript:;" disabled="disabled" class="btn btn-xs btn-primary"  title="This subscription has been cancelled">
			<i class="la la-close"></i>
		</a>
	@else
		<a href="{{ backpack_url('subscription/cancel/'.$entry->getKey()) }}" class="btn btn-xs btn-primary"  title="Cancel this subscription">
			<i class="la la-close"></i>
		</a>
	@endif
@endif
