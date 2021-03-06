<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_index(){
        return view('auth.login');
    }

    public function register_index(){
        return view('auth.register');
    }

    public function register(Request $request){
        $data = $request->only(array_keys($this->getRegisterParams()));
        $validator = Validator::make($data, $this->getRegisterParams());

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $user = User::create([
                'name' => $data['name'],
                'role' => User::USER
            ]);
            if($user){
                $user->game()->create([
                    'user_id' => $user->id,
                    'total_point' => 0
                ]);

                Session::put('user', $user->name);
                Session::put('role', $user->role);
                return view('board.index',[
                    'data' => $this->getShuffledWord(),
                    'point' => 0
                ]);
            }else{
                return redirect()->back();
            }
        }
    }

    public function login(Request $request){
        $data = $request->only(array_keys($this->getLoginParams()));
        $validator = Validator::make($data, $this->getLoginParams());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $activeUser = User::where('email', $data['email'])->first();

            if($activeUser && Hash::check($data['password'], $activeUser->password)){
                Session::put('email', $data['email']);
                Session::put('role', $activeUser->role);
                return redirect()->route('admin_dashboard_page');
            }else{
                return redirect()->back();
            }
        }
    }

    public function userLogout(){
        $this->logout();
        return redirect()->route('user_register_page');
    }

    public function adminLogout(){
        $this->logout();
        return redirect()->route('admin_login_page');
    }

    private function logout(){
        Session::forget(['user','role']);
    }

    private function getLoginParams(){
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    private function getRegisterParams(){
        return [
            'name' => 'required'
        ];
    }

    private function getShuffledWord(){
        $initialWord =  Word::inRandomOrder()->first();
        return [
            'answer' => $initialWord,
            'shuffledWord' => str_shuffle($initialWord->name)
        ];
    }
}
