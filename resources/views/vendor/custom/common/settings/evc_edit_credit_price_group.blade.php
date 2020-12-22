@if(!empty($entry))
    @extends(backpack_view('blank'))

    @php
    $defaultBreadcrumbs = [
        trans('backpack::crud.admin') => backpack_url('dashboard'),
        $crud->entity_name_plural => url($crud->route),
        trans('backpack::crud.edit') => false,
    ];

    // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
    $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
    @endphp

    @section('header')
        <section class="container-fluid">
        <h2>
            <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
            <small>{!! $crud->getSubheading() ?? trans('backpack::crud.edit').' '.$crud->entity_name !!}.</small>

            @if ($crud->hasAccess('list'))
            <small><a href="{{ url($crud->route) }}" class="d-print-none font-sm"><i class="la la-angle-double-{{ config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left' }}"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
            @endif
        </h2>
        </section>
    @endsection

    @section('content')
    <div class="row">
        <div class="{{ $crud->getEditContentClass() }}">
            <!-- Default box -->

            @include('crud::inc.grouped_errors')

            <form method="post" action="{{ backpack_url('tuning-credit/'.$entry->id) }}">
                @csrf
                @method('PUT')
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
                            <div class="card-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
                                <div class="hidden">
                                    <input name="id" value="{{ $entry->id }}" class="form-control" type="hidden">
                                </div>
                                <div class="form-group col-md-8 col-xs-12 required {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Group name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Group name" value="{{ (old('name')) ? old('name') : (($entry->name) ? $entry->name : '') }}">
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
                                        @php
                                            $groupCreditTire = $tuningCreditTire->tuningCreditGroups()->where('tuning_credit_group_id', $entry->id)->withPivot('from_credit', 'for_credit')->first();
                                        @endphp
                                        <div class="form-group col-md-6 col-xs-12 required {{ $errors->has('credit_tires.'.$tuningCreditTire->id.'.from_credit') ? ' has-error' : '' }}">
                                            <label>{{ $tuningCreditTire->amount }} credit from</label>
                                            <input type="text" name="credit_tires[{{ $tuningCreditTire->id }}][from_credit]" class="form-control" placeholder=""
                                            value="{{ (old('credit_tires.'.$tuningCreditTire->id.'.from_credit'))?old('credit_tires.'.$tuningCreditTire->id.'.from_credit'):((@$groupCreditTire->pivot->from_credit)?@$groupCreditTire->pivot->from_credit:'') }}">
                                            @if ($errors->has('credit_tires.'.$tuningCreditTire->id.'.from_credit'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('credit_tires.'.$tuningCreditTire->id.'.from_credit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12 required {{ $errors->has('credit_tires.'.$tuningCreditTire->id.'.for_credit') ? ' has-error' : '' }}">
                                            <label>{{ $tuningCreditTire->amount }} credit for</label>
                                            <input type="text" name="credit_tires[{{ $tuningCreditTire->id }}][for_credit]" class="form-control" placeholder=""
                                            value="{{ (old('credit_tires.'.$tuningCreditTire->id.'.for_credit'))?old('credit_tires.'.$tuningCreditTire->id.'.for_credit'):((@$groupCreditTire->pivot->for_credit)?@$groupCreditTire->pivot->for_credit:'') }}">
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
                                            <span>Save</span>
                                        </button>
                                    </div>
                                    <a href="{{ backpack_url('tuning-credit') }}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
@endif

