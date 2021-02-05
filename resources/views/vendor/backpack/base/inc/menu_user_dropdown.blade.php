<li class="nav-item dropdown pr-4">
  <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <img class="img-avatar" src="{{ Avatar::create(Auth::user()->fullname)->toBase64() }}" alt="user">
  </a>
  <div class="dropdown-menu {{ config('backpack.base.html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1">
    <a class="dropdown-item" href="{{ route('account.info') }}"><i class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('admin.auth.logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="la la-lock"></i> {{ trans('backpack::base.logout') }}
    </a>
    <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</li>
