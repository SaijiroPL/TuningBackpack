@if(isset($entry))
	@if($entry->status == 'Cancelled')
		<a href="javascript:;" disabled="disabled" class="btn btn-sm btn-primary"  title="This subscription has been cancelled">
			<i class="la la-ban"></i>
		</a>
	@else
		<a href="{{ backpack_url('subscription/immediate/'.$entry->getKey()) }}" class="btn btn-sm btn-primary"  title="Cancel this subscription immediately">
			<i class="la la-ban"></i>
		</a>
	@endif
@endif
