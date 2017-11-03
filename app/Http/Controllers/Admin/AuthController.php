<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AuthController extends AdminController
{
    public function getLogin()
	{ 
		if (Auth::check()) {
			// Logged in, go to the dashboard
			return redirect($this->ADMIN_URL.'/dashboard');
		}

		return view('admin.auth.login');
	}

	public function postLogin(){
		$credentials = array('email'=>Input::get('email'),'password'=>Input::get('password'));
		if(Auth::attempt($credentials)){
			return redirect($this->ADMIN_URL.'/dashboard');
		}else{
			return back()->withInput();
		}
	}

	public function dashboard(){
		return view('admin.auth.dashboard');
	}

	public function logout(){
		Auth::logout();
		return redirect('/'.$this->ADMIN_URL);
	}
}
