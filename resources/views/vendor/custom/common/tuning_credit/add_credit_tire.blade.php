@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    trans('Tuning credits') => url('tuning-credit'),
    trans('Credit tier') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid">
	  <h2>
        <span class="text-capitalize">Tuning Credits</span>
        <small>Add credit tier.</small>
        <small><a href="{{ url('tuning-credit') }}" class="d-print-none font-sm"><i class="la la-angle-double-{{ config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left' }}"></i> {{ trans('backpack::crud.back_to_all') }} <span>tuning credit prices</span></a></small>
	  </h2>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-xs-12">
		<form method="POST" action="{{ backpack_url('tuning-credit/credit-tire') }}">
		  	@csrf
		  	<div class="card">
		    	<div class="card-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
					<div class="form-group col-md-6 col-xs-12 required {{ $errors->has('amount') ? ' has-error' : '' }}">
					    <label>Amount</label>
				        <input name="amount" value="" placeholder="Amount" class="form-control" type="text">
				        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
				    </div>
		    	</div><!-- /.box-body -->
			    <div class="card-footer">
	                <div id="saveActions" class="form-group">
					    <div class="btn-group">
					        <button type="submit" class="btn btn-danger">
					            <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
					            <span>Save</span>
					        </button>
					    </div>
					    <a href="{{ backpack_url('tuning-credit') }}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
					</div>
		    	</div><!-- /.box-footer-->
		  	</div><!-- /.box -->
		</form>
	</div>
</div>

@endsection
