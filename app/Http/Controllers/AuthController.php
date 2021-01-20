<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_index(){
        return view('auth.login');
    }

    public function register(){

    }

    public function login(Request $request){
        $data = $request->only(array_keys($this->getParams()));
        $validator = Validator::make($data, $this->getParams());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $activeUser = User::where('email', $data['email'])->first();

            if($activeUser && Hash::check($data['password'], $activeUser->password)){
                Session::put('email', $data['email']);
                Session::put('role', $activeUser->role()->first()->name);
//                return redirect()->route('dashboard');
            }else{
                return redirect()->back();
            }
        }
    }

    private function getParams(){
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
}
