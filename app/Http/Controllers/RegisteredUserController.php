<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Employees;
use App\Http\Requests\UpdateEmployeesRequest;
use App\Models\Prefixs;
use App\Models\Positions;
use App\Models\Psts;
use App\Models\Typemilitarys;
use App\Models\Divingcards;
use App\Models\Cartypes;
use App\Models\TypeEducations;
use App\Models\Nationalitys;
use App\Models\Races;
use App\Models\Religions;
use App\Models\Childens;
use App\Models\Militarys;
use App\Models\AgeDivingcards;
use App\Models\Jopps;
use App\Models\Cases;
use App\Models\Vaccines;
use App\Models\Diseases;
use App\Models\Addicteds;
use App\Models\Educations;
use App\Models\Acquaintances;
use App\Models\Companys;
use App\Models\Maimlines;
use App\Models\Accountnumbers;
use App\Models\Salarys;
use App\Models\Meetings;
use App\Models\Months;
use App\Models\Reportsalarys;
use App\Models\User;
use Hash;
use Str;
class RegisteredUserController extends Controller
{
    public function register()//แสดงชื่อพนักงานไปหน้าregister แต่ตรวจว่า มีการลงทะเบียนไอดีนี้ไปแล้วหรือยัง
    {
        $employees = Employees::whereDoesntHave('User')->get();
        return view('admin/register/register',compact('employees'));
    }
    public function register_post(request $request)//สมัครรหัส
    {
        $user = request()->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'type' => 'required'
            ],[
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'กรุณาป้อนรหัสผ่านมากกว่า8ตัว',
            'password_confirmation.required_with' => 'กรุณาป้อนรหัสผ่านอีกครั้ง',
            'password_confirmation.same' => 'รหัสผ่านทั้งสองต้องตรงกัน',
            'type.required' => 'กรุณากรอกชนิด',
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->type = trim($request->type);
        $user->employee_id = trim($request->employee_id);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect()->back()->with('message','สมัครสมาชิกเสร็จสิ้น');
    }
}
