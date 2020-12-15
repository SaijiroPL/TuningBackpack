@extends(backpack_view('blank'))

@section('content')
    @if($user->is_admin)
    {{-- Start Admin Dashboard --}}

    @include('backpack::inc.admin_dashbaord')

    {{-- End Admin Dashboard --}}
    @else
    {{-- Start Customer Dashboard --}}

    @include('backpack::inc.customer_dashbaord')

    {{-- End Customer Dashboard --}}
    @endif
@endsection
