<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use App\Models\Employees;
use Illuminate\Http\Request;
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
class UserController extends Controller
{
    public function UserInfo()//ไปหน้า ีuserinfo
    {
        $iduser = Auth::user();
        $user = User::where('id',$iduser->id)->first();
        return view ('user/users/info',compact('user'));
    }
}
