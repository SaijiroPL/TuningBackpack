<!-- =================================================== -->
<!-- ========== Top menu items (ordered left) ========== -->
<!-- =================================================== -->
<ul class="nav navbar-nav d-md-down-none">

    @if (Auth::check())
        <!-- Topbar. Contains the left part -->
        @include(backpack_view('inc.topbar_left_content'))
    @endif

</ul>
<!-- ========== End of top menu left items ========== -->



<!-- ========================================================= -->
<!-- ========= Top menu right items (ordered right) ========== -->
<!-- ========================================================= -->
<ul class="nav navbar-nav ml-auto @if(config('backpack.base.html_direction') == 'rtl') mr-0 @endif" style="margin-right: 10px;">
    <!-- Topbar. Contains the right part -->
    @include(backpack_view('inc.topbar_right_content'))
    @include(backpack_view('inc.menu_user_dropdown'))
</ul>
<!-- ========== End of top menu right items ========== -->
