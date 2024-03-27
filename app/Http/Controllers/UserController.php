<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check if validation fails.
        if ($validator->fails()) {
            // For API Testing in Postman.
            // return $this->sendError('validation_error', $validator->errors()->first());

            // For testing in Browser.
            return redirect()->route('loginPage')->with('error', $validator->errors()->first());
        }

        //Checking credentials using Auth.
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $userName = User::where('email', $request->email)->select('name')->first()->name;

            $ip = $request->ip();
            Session::put('active_session_' . $ip, true);

            return view('dashboard', compact('userName'));

        } else {

            return redirect()->route('loginPage')->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function closeAndRedirect(Request $request)
    {
        $ip = $request->ip();
        Session::forget('active_session_' . $ip);
        return redirect()->route('loginPage'); // Redirect to the login
    }
}
