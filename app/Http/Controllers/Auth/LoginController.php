<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        AuthenticatesUsers::login as traitLogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a successful authentication attempt.
     *
     * @param Request                                    $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return \Illuminate\View\View
     */
    public function authenticated(Request $request, $user)
    {
        if ($user->uses_two_factor_auth) {
            return $this->redirectForTwoFactorAuth($request, $user);
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('nova.login');
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Redirect the user for two-factor authentication.
     *
     * @param Request                                    $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return \Illuminate\View\View
     */
    protected function redirectForTwoFactorAuth(Request $request, $user)
    {
        auth()->logout();

        $request->session()->put(['ark:auth:id' => $user->id]);

        return redirect()->route('two-factor.login');
    }
}
