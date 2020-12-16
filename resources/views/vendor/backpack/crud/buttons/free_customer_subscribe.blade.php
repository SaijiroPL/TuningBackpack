@if(isset($entry))
    @if($entry->owner && !$entry->owner->hasActiveSubscription())
        <a href="{{ url($crud->route.'/'.$entry->getKey().'/company-trial-subscription') }}" class="btn btn-sm btn-danger" title="Add trial subscription for this company">
        <i class="la la-btn la-money"></i>
    </a>
    @else
    <a href="javascript:;" disabled="disabled" class="btn btn-sm btn-danger" title="Please complete company registration process.">
        <i class="la la-btn la-money"></i>
    </a>
    @endif
@endif
