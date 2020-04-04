<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\User;

class UsersController extends Controller
{
  public function showLogin()
  {
    return \View::make('login');
  }

  public function doLogin()
  {
  // validate the info, create rules for the inputs
    $rules = array(
        'email'    => 'required|email', // make sure the email is an actual email
        'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    );

    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails())
    {
        return Redirect::to('login')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    }
    else
    {
      // create our user data for the authentication
      $userdata = array(
          'email'     => Input::get('email'),
          'password'  => Input::get('password')
      );
      // attempt to do the login
      if (Auth::attempt($userdata))
      {
          // validation successful!
          // redirect them to the secure section or whatever
          // return Redirect::to('secure');
          // for now we'll just echo success (even though echoing in a controller is bad)
          $url = redirect()->intended()->getTargetUrl();

          try
          {
            if (Auth::user()->isadmin == true)
            {
              $url="/admin/clothing_orders";
              $msg = 'Welcome Administrator';
            }
            else
            {
              $msg = 'Welcome '.Auth::user()->name;
            }
            $arr = array('err'=>false,'msg'=>$msg,'redirect'=>$url);
            echo json_encode($arr);
          }
          catch (\Exception $e)
          {
            $arr = array('err'=>true,'msg'=>'Error');
            echo json_encode($arr);
          }

      }
      else
      {
          // validation not successful, send back to form
          return Redirect::to('login');
      }
    }
  }
  public function logout()
  {
    Auth::logout(); // log the user out of our application
    return Redirect::to('login'); // redirect the user to the login screen
  }
  public function showRegister()
  {
    return view('register');
  }
  public function doRegister()
  {
    $i =(object) Input::all();
    $u = new User;

    $u->name = $i->name;
    $u->email = $i->email;
    $u->phone = $i->phone;
    $u->address = $i->address;
    $u->isAdmin = 0;
    $u->password =Hash::make($i->password);

    try
    {
      $u->save();

      $arr = array('err'=>false,'msg'=>"You are now registered. welcome ".$u->name."!");
      echo json_encode($arr);
    }
    catch (\Exception $e)
    {
      $arr = array('err'=>true,'msg'=>'Could not register data');
      echo json_encode($arr);
    }
  }
}
