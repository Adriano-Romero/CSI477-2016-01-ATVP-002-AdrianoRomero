<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Registration & Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users, as well as the
		    | authentication of existing users. By default, this controller uses
		    | a simple trait to add these behaviors. Why don't you explore it?
		    |
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'nome' => 'required|max:45',
			'login' => 'required|max:20|unique:clientes,login',
			'senha' => 'required|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data) {
		return Cliente::create([
			'nome' => $data['nome'],
			'login' => $data['login'],
			'senha' => bcrypt($data['senha']),
		]);
	}
	public function webLogin() {
		return view('webLogin');
	}

	public function webLoginPost(Request $request) {
		$this->validate($request, [
			'login' => 'required',
			'password' => 'required',
		]);
		if (auth()->attempt(['login' => $request->input('login'), 'password' => $request->input('password')])) {
			$usuario = auth()->usuario();
			dd($usuario);
		} else {
			return back()->with('error', 'your username and password are wrong.');
		}
	}
}
