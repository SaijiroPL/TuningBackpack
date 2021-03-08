@if(isset($entry))
	<a href="{{ backpack_url('subscription-payment?company='.$entry->user->company_id.'&subscription='.$entry->getKey()) }}" class="btn btn-sm btn-primary"  title="View all billings payments for this subscription">
		<i class="la la-btn la-list"></i>
	</a>
@endif
