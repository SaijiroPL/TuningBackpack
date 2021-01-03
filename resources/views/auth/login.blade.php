@extends(backpack_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="card login-container">
            <div class="card-body">
                <div class="col-left">
                    @if(\File::exists(public_path('uploads/logo/' . $company->logo)))
                        <div class="logo-admin">
                            <img src="{{ asset('uploads/logo/' . $company->logo) }}">
                        </div>
                    @endif
                    <h5 class="mb-2 login-caption">Customer Login</h5>
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label" for="email">{{ config('backpack.base.authentication_column_name') }}</label>

                            <div>
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">{{ trans('backpack::base.password') }}</label>

                            <div>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('backpack::base.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.login') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center"><a href="{{ route('admin.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
                    </form>
                </div>
                <div class="col-right">
                    <div class="box box-default " style="">
                        <div class="box-body reg-box">
                            <div class="box-title login-title">Don't have an account yet?</div>
                            <p><strong>As a registered user you can:</strong></p>

                            <ul>
                                <li>Buy credits using PayPal </li>
                                <li>Upload tuningfiles and receive the modified files in return</li>
                                <li>Modified files are of high quality, safe and Dyno-tested</li>
                                <li>Every tuning file is custom made to fit your car, with the best perfomance results</li>
                                <li>Fast and Secure. Your connection is secured using SSL Encryption</li>
                                <li>Your modified library is stored in the cloud for future use</li>

                            </ul>
                            <div class="button-container">
                                <a class="btn btn-danger" href="{{ route('users_registers') }}">
                                    {{ __('Register') }}
                                </a>
                                <a class="btn btn-danger" href="{{ route('browser') }}">
                                    {{ __('Browser Tuning Specs') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
