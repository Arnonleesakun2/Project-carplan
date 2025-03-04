<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function index()//หน้าแรกของเว็ป
    {
        return view ('home/index');
    }
    public function login_post (request $request)//ล็ออคอิน
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],true))
        {
            if(Auth::User()->type =='admin'){
                return redirect()->intended('/AdminDashBoard');
            }else if(Auth::User()->type =='user'){
                return redirect()->intended('/UserDashBoard');
            }else if(Auth::User()->type =='planner'){
                return redirect()->intended('/PlannerDashBoard');
            }else{
                return redirect()->back()->with('error','ไม่พบอีเมลนี้');
            }
        }else{
            return redirect()->back()->with('error','อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        }
    }
    public function register_post(request $request)//สมัคร
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'type' => 'required'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->type = trim($request->type);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect('/')->with('message','สมัครสมาชิกเสร็จสิ้น');
    }
    public function Logout()//ล็อคเอ้า
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
