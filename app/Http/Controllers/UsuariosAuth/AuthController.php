<?php

namespace App\Http\Controllers\UsuariosAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Usuario;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator;

class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest', ['except' => 'logout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'login' => 'required|login|max:255|unique:usuarios',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data) {
		return Usuario::create([
			'name' => $data['name'],
			'login' => $data['login'],
			'password' => bcrypt($data['password']),
		]);
	}

	public function adminLogin() {
		return view('adminLogin');
	}

	public function adminLoginPost(Request $request) {
		$this->validate($request, [
			'login' => 'required',
			'password' => 'required',
		]);
		if (auth()->guard('admin')->attempt(['login' => $request->input('login'), 'password' => $request->input('password')])) {
			$usuario = auth()->guard('admin')->usuario();
			dd($usuario);
		} else {
			return back()->with('error', 'your username and password are wrong.');
		}
	}
}