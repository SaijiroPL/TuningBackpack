@if(isset($entry))
	@if(!$entry->is_default)
            @if($entry->owner)
		<a href="{{ backpack_url('subscription?company='.$entry->getKey()) }}" class="btn btn-sm btn-primary"  title="View all subscriptions for this company">
			<i class="la la-btn la-list"></i>
		</a>
            @else
                <a href="javascript:;" class="btn btn-sm btn-primary" disabled="disabled"  title="Please complete company registration process.">
			<i class="la la-btn la-list"></i>
		</a>
            @endif
	@endif
@endif
