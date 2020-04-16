<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin_guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:190',
            'email' => 'required|email|max:190|unique:admins',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    public function showLoginForm()
    {
        return view('auth_admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
