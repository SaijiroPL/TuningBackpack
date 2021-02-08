@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    config('backpack.base.project_name') => backpack_url(),
    'Packages' => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="content-header">
        <h2 style="margin-left: 30px;">
            Packages<small>Subscribe any of the package</small>
        </h1>
    </section>
@endsection

@section('content')
    <div class="row">
        @if($packages->count() > 0)
            @foreach($packages as $package)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header with-border">
                            <h3 class="box-title">{{ $package->name }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body" style="min-height: 150px">
                            <div class="table-responsive">
                                <table class="table table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Billing Interval</th>
                                            <td>{{ $package->billing_interval }}</td>
                                        </tr>
                                        <tr>
                                            <th>Amount</th>
                                            <td>{{ $package->amount_with_current_sign }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                {!! $package->description !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('subscribe.paypal', $package->id) }}" class="btn btn-primary">Subscribe plan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <p>
                    There are no subscription plans. please contact to administrator.
                </p>
            </div>
        @endif
    </div>
@endsection
