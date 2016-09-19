<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Index login controller
     */
    public function index(Request $request)
    {
    	$hasher = app()->make('hash');

    	$email = $request->input('email');
    	$password = $request->input('password');

    	$login = User::where('email', $email)->first();
        if (!$login) {
            return response()->json([
                'success' => FALSE, 
                'message' => 'Your email or password incorrect!'
            ]);
        }else{
            if ($hasher->check($password, $login->password)) {

                $api_token = sha1(time());
                $create_token = User::where('id', $login->id)->update(['api_token' => $api_token]);
                if ($create_token) {
                    return response()->json([
                        'success' => TRUE,
                        'api_token' => $api_token, 
                        'message' => 'Your email or password incorrect!'
                    ]);
                }
            }else{
                return response()->json([
                    'success' => TRUE, 
                    'message' => 'Your email or password incorrect!'
                ]);
            }
        }

    }
}