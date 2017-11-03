<?php

namespace App\Http\Controllers\Vendor;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

use App\Company;
use App\Bank;
use App\User;

class AuthController extends VendorController
{
    public function getLogin()
	{ 
		if (Auth::check()) {
			// Logged in, go to the dashboard
			return redirect($this->VENDOR_URL.'/dashboard');
		}

		return view('vendor.auth.login');
	}

	public function postLogin(Request $request){

		$validator = Validator::make($request->all(),[
			'email' => 'required|email|max:255',
			'password' => 'required'
		]);

		if($validator->fails()){
			return back()->withInput();
		}else{

			$credentials = array('email'=> $request->email,'password'=>$request->password,'role_id'=>'2','status'=>'1');
			if(Auth::attempt($credentials)){
				//$msg = "You are successfully Login <a href='".url($this->VENDOR_URL.'/logout')."'>Logout</a>"; die;
				return redirect($this->VENDOR_URL.'/dashboard');
			}else{
				return back()->with('status', 'Invalid Username or password.')->withInput();
			}
		}
	}

	public function getSignup()
	{ 
		if (Auth::check()) {
			// Logged in, go to the dashboard
			return redirect($this->VENDOR_URL.'/dashboard');
		}

		return view('vendor.auth.signup');
	}

	public function postSignup(Request $request){

		$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => '',
            'email'                 => 'required|email|max:255|unique:users',
            'password'              => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required|same:password',
            'name' => 'required|max:255',
            'address1' => 'required',
            'city' => 'required',
            'zip' => 'required'

        ]);

        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        }
        else{
        	$user = new User;
        	$user->first_name = $request->first_name;
        	$user->last_name = $request->last_name;
        	$user->email = $request->email;
        	$user->role_id = '2';
        	$user->status = '1';
        	$user->password = bcrypt($request->password);

        	$user->save();
			
			$company = new Company;
			$company->user_id = $user->id;
			$company->company_id = $request->company_id;
			$company->name = $request->name; 
        	$company->tax_id = $request->tax_id; 
        	$company->store_url = $request->store_url; 
        	$company->about_company = $request->about_company; 
        	$company->address1 = $request->address1; 
        	$company->address2 = $request->address2; 
        	$company->city = $request->city; 
        	$company->state = $request->state; 
        	$company->country_id = $request->country_id; 
        	$company->zip = $request->zip;

        	$company->save();

        	$bank = new Bank;
        	$bank->user_id = $user->id;
        	$bank->bank_name = $request->bank_name;
        	$bank->account_number = $request->account_number;
        	$bank->neft_code = $request->neft_code;
        	$bank->tax_id = $request->tax_id;
        	$bank->bank_address = $request->bank_address;
        	$bank->paypal_email = $request->paypal_email;

        	$bank->save();

        	return redirect($this->VENDOR_URL)->with('status', 'Registration Successfully, You can login now.');
        }
	}

	public function dashboard(){
		return view('vendor.auth.dashboard');
		//echo "You are successfully Login <a href='".url($this->VENDOR_URL.'/logout')."'>Logout</a>"; die;
	}

	public function logout(){
		Auth::logout();
		return redirect('/'.$this->VENDOR_URL);
	}
}
