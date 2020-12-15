<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;

class LoginController extends Controller
{
    protected $data = []; // the information we send to the view
    protected $redirectTo = '/admin/dashboard';
    protected $company;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers {
        logout as defaultLogout;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("guest:admin", ['except' => 'logout']);
        $this->company = \App\Models\Company::where('domain_link', url(''))->first();
        if(!$this->company){
            abort(400, 'No such domain('.url("").') is registerd with system. Please contact to webmaster.');
        }
        View::share('company', $this->company);
    }

    protected function guard() {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
       return view('auth.admin.login');
    }

    public function login(Request $request) {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

		$email = $request->get($this->username());

        $user = User::where($this->username(), $email)->first();
        if (!empty($user)) {
            if ($user->is_admin == 0) {
                return redirect('admin/login')->with(['status'=>'error', 'message'=>__('auth.invalid_admin_privilege')]);
            }
			if ($user->is_active == 0) {
				return redirect('admin/login')->with(['status'=>'error', 'message'=>__('Your account is not verified yet, Please wait or Contact to administration. ')]);
			}
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);


        return $this->sendFailedLoginResponse($request);
    }
    public function logout(Request $request) {
        $this->guard()->logout($request);
        return redirect('admin/login')->with(['status' => 'success', 'message' => __('auth.logged_out')]);
    }
}
