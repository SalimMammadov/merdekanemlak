<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Customer;
use Hash;
use Session;
class CustomerController extends Controller
{



        public function __construct()
      {
      # There is except that is mean not to use this middleware on the logout function
       $this->middleware('guest:customer')->except('logout');
      }



 public function showLoginForm()
 {
   return view('auth/login');
 }
 public function login(Request $request)
 {
   $this->validate($request,[
     'email' => 'required | email',
     'password' => 'required | min:6',
   ]);

   if(Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
   {
      return redirect('/');
   }
   else{
     Session::flash('danger',"Səhvlik var...");
   return redirect()->back()->withInput($request->only('email','remember'));
 }
 }

 public function logout(Request $request)
 {
     Auth::guard('customer')->logout();

     return  redirect('/');
 }

 public function register()
 {
   return view('auth.register');
 }

  public function register_submit(Request $request)
  {
    Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Customer::create([
            'name' => $request['name'],
            'surname' => $request->surname,
            'email' => $request['email'],
            'telephone' =>$request->telephone,
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/login');
  }



}
