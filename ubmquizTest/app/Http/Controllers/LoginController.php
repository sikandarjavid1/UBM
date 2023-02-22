<?php

namespace App\Http\Controllers;

use App\Models\options;
use App\Models\results;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'email'=> 'required',
            'password'=> 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {

            $user = User::where('email',$req->input('email'))->first();

            if($user->password == $req->input('password'))
            {
                $req->session()->put('user',$user->first_name);
                return response()->json([
                    'status'=>200,
                    'message'=>'Option Updated Successfully.',
                    'data'=>$user,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Username or Password Incorrect'
                ]);
            }



        }
    }
    public function logout(Request $req)
    {
        $req->session()->forget('user');
        return redirect('/login');

    }
}
