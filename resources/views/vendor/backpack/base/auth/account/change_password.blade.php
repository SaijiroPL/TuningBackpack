@extends('backpack::blank')

@section('after_styles')
<style media="screen">
    .backpack-profile-form .required::after {
        content: ' *';
        color: red;
    }
    .nav-stacked {
        display: table;
    }
    .nav-stacked>li {
        border-top: 1px solid #f4f4f4;
        margin: 0;
        padding: 10px;
    }
    .nav-stacked>li.active, .nav-stacked>li.active:hover {
        background: transparent;
        color: #444;
        border-top: 0;
        border-left-color: #3c8dbc;
    }
    .nav-pills>li.active>a {
        font-weight: 600;
    }
    .nav-stacked>li {
        border-radius: 0;
        border-top: 0;
        border-left: 3px solid transparent;
        color: #444;
    }
</style>
@endsection

@php
  $defaultBreadcrumbs = [
    config('backpack.base.project_name') => backpack_url(),
    trans('backpack::base.my_account') => route('account.info'),
    trans('backpack::base.change_password') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
<section class="content-fluid">
    <h2 style="margin-left:30px">
        {{ trans('backpack::base.my_account') }}
    </h2>
</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('backpack::auth.account.sidemenu')
    </div>
    <div class="col-md-9">

        <form class="form" action="{{ route('account.password') }}" method="post">

            {!! csrf_field() !!}

            <div class="card">

                <div class="card-body backpack-profile-form">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group col-md-6 col-xs-12">
                        @php
                            $label = trans('backpack::base.new_password');
                            $field = 'new_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group col-md-6 col-xs-12">
                        @php
                            $label = trans('backpack::base.confirm_password');
                            $field = 'confirm_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-danger"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.change_password') }}</span></button>
                    <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
