<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    private $salt;
    public function __construct()
    {
        $this->salt="userloginregister";
    }
    public function login(Request $request){
        if ($request->has('username') && $request->has('password')) {
            $user = User:: where("username", "=", $request->input('username'))
                ->where("password", "=", sha1($this->salt.$request->input('password')))
                ->first();
            if ($user) {
                $token=str_random(60);
                $user->api_token=$token;
                $user->save();
                return $user->api_token;
            } else {
                return "error";
            }
        } else {
            return "not found";
        }
    }
    public function register(Request $request){
        if ($request->has('username') && $request->has('password') && $request->has('email')) {
            $user = new User;
            $user->username=$request->input('username');
            $user->password=sha1($this->salt.$request->input('password'));
            $user->email=$request->input('email');
            $user->api_token=str_random(60);
            if($user->save()){
                return "saved";
            } else {
                return "not saved";
            }
        } else {
            return "not found";
        }
    }
    public function info(){
        return Auth::user();
    }
}
