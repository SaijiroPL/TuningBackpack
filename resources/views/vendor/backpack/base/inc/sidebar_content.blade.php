@if($user->is_admin)
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('dashboard') }}">
            <i class="la la-dashboard nav-icon"></i> <span>{{ trans('backpack::base.dashboard') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('customer') }}">
            <i class="la la-fw la-users nav-icon"></i> <span>{{ __('customer_msg.menu_Customers')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('file-service') }}">
            <i class="la la-download nav-icon"></i> <span>{{ __('customer_msg.menu_FileServices')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('tickets') }}">
            <i class="la la-comments nav-icon"></i> <span>{{ __('customer_msg.menu_SupportTickets')}}</span>
            @if($tickets_count)
                <span class="pull-right-container">
              <small class="label pull-right bg-blue"><i class="la la-envelope"></i></small>
            </span>
            @endif
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('order') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('customer_msg.menu_Orders')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('transaction') }}">
            <i class="la la-fw la-table nav-icon"></i> <span>{{ __('customer_msg.menu_Transactions')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('email-template') }}">
            <i class="la la-copy nav-icon"></i> <span>{{ __('customer_msg.menu_EmailTemplates')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('tuning-credit') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('customer_msg.menu_TuningCredit')}}</span>
        </a>
    </li>
    @if($user->company->reseller_id)
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('tuning-evc-credit') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('customer_msg.menu_EVCTuningCredit')}}</span>
        </a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('tuning-type') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('customer_msg.menu_TuningTypes')}}</span>
        </a>
    </li>
    @if($user->is_master)
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('company') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('Manage Companies')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('package') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('Packages')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('slidermanager') }}">
            <i class='la la-list nav-icon'></i> <span>{{ __('SliderManager')}}</span>
        </a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('subscription') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('customer_msg.menu_MySubscriptions')}}</span>
        </a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('company-setting') }}">
            <i class="la la-cog nav-icon"></i> <span>{{ __('customer_msg.menu_CompanySettings')}}</span>
        </a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('buy-credits') }}">
            Tuning credits
            <h3 style="margin:5px 0px; font-size:3rem; font-weight:bold">{{ $user->user_tuning_credits }}</h3>
            <button class="btn btn-danger">Buy credits &nbsp;<i class="la la-arrow-right"></i></button>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('dashboard') }}">
            <i class="la la-dashboard nav-icon"></i> <span>{{ trans('backpack::base.dashboard') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('file-service') }}">
            <i class="la la-download nav-icon"></i> <span>{{ __('customer_msg.menu_FileServices')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('tickets') }}">
            <i class="la la-comments nav-icon"></i> <span>{{ __('customer_msg.menu_SupportTickets')}}</span>
            @if($tickets_count)
                <span class="pull-right-container">
              <small class="label pull-right bg-blue"><i class="la la-envelope"></i></small>
            </span>
            @endif
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('buy-credits') }}">
            <i class="la la-plus nav-icon"></i> <span>{{ __('customer_msg.menu_BuyTuningCredits')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('order') }}">
            <i class="la la-list nav-icon"></i> <span>{{ __('customer_msg.menu_Orders')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('transaction') }}">
            <i class="la la-fw la-table nav-icon"></i> <span>{{ __('customer_msg.menu_Transactions')}}</span>
        </a>
    </li>
@endif


<style>
    .flag-icon{
        width: 16px;
        height: auto;
    }
    .dropdown-item{

        min-width: 180px;
        border-top-left-radius: calc(.25rem - 1px);
        border-top-right-radius: calc(.25rem - 1px);
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
        position: relative;
    }

</style>
