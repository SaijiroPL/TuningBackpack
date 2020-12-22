@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.add') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid">
	  <h2>
        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
        <small>{!! $crud->getSubheading() ?? trans('backpack::crud.add').' '.$crud->entity_name !!}.</small>

        @if ($crud->hasAccess('list'))
          <small><a href="{{ url($crud->route) }}" class="d-print-none font-sm"><i class="la la-angle-double-{{ config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left' }}"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
        @endif
	  </h2>
	</section>
@endsection

@section('content')

<div class="row">
	<div class="{{ $crud->getCreateContentClass() }}">
		<!-- Default box -->

		<form method="post" action="{{ url($crud->route) }}">
			@csrf
		  <div class="row">
			  <div class="col-md-12">
				  @if($errors->any())
					  <div class="callout callout-danger">
						  <h4>Please fix the errors</h4>
						  <ul>
							  @foreach($errors->all() as $error)
								  <li>{{ $error }}</li>
							  @endforeach
						  </ul>
					  </div>
				  @endif
				  <!-- Default box -->
					<div class="card">
					  <div class="card-body row" style="display: flex; flex-wrap: wrap;">
							  <div class="form-group col-md-8 col-xs-12 required {{ $errors->has('name') ? ' has-error' : '' }}">
								  <label>{{__('customer_msg.price_GroupName')}}</label>
								  <input type="text" name="name" class="form-control" placeholder="Group name" value="{{ old('name') }}">
								  @if ($errors->has('name'))
									  <span class="help-block">
										  <strong>{{ $errors->first('name') }}</strong>
									  </span>
								  @endif
							  </div>
							  @php
								  $tuningCreditTires = \App\Models\TuningCreditTire::where('company_id', $user->company_id)->where('group_type', 'normal')->orderBy('amount', 'ASC')->get();
							  @endphp
							  @if($tuningCreditTires->count() > 0)
								  @foreach($tuningCreditTires as $tuningCreditTire)
									  <div class="form-group col-md-6 col-xs-12 required {{ $errors->has('credit_tires.'.$tuningCreditTire->id.'.from_credit') ? ' has-error' : '' }}">
										  <label>{{ $tuningCreditTire->amount }} {{__('customer_msg.price_CreditFrom')}}</label>
										  <input type="text" name="credit_tires[{{ $tuningCreditTire->id }}][from_credit]" class="form-control" placeholder="" value="{{ old('credit_tires.'.$tuningCreditTire->id.'.from_credit') }}">
										  @if ($errors->has('credit_tires.'.$tuningCreditTire->id.'.from_credit'))
											  <span class="help-block">
												  <strong>{{ $errors->first('credit_tires.'.$tuningCreditTire->id.'.from_credit') }}</strong>
											  </span>
										  @endif
									  </div>
									  <div class="form-group col-md-6 col-xs-12 required {{ $errors->has('credit_tires.'.$tuningCreditTire->id.'.for_credit') ? ' has-error' : '' }}">
										  <label>{{ $tuningCreditTire->amount }} {{__('customer_msg.price_CreditFor')}}</label>
										  <input type="text" name="credit_tires[{{ $tuningCreditTire->id }}][for_credit]" class="form-control" placeholder="" value="{{ old('credit_tires.'.$tuningCreditTire->id.'.for_credit') }}">
										  @if ($errors->has('credit_tires.'.$tuningCreditTire->id.'.for_credit'))
											  <span class="help-block">
												  <strong>{{ $errors->first('credit_tires.'.$tuningCreditTire->id.'.for_credit') }}</strong>
											  </span>
										  @endif
									  </div>
								  @endforeach
							  @endif
					  </div><!-- /.box-body -->
					  <div class="card-footer">
						  <div id="saveActions" class="form-group">
							  <div class="btn-group">
								  <button type="submit" class="btn btn-success">
									  <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
									  <span>{{__('customer_msg.btn_Save')}}</span>
								  </button>
							  </div>
							  <a href="{{ backpack_url('tuning-credit') }}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;{{__('customer_msg.btn_Cancel')}}</a>
						  </div>
					  </div>
					</div>
			  </div>
		  </div>
	  </form>
	</div>
</div>

@endsection

