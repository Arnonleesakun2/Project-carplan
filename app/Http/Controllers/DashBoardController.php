<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
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
use App\Models\Allowances;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Branchs;
use App\Models\Roads;
use App\Models\Cars;
use App\Models\Baskets;
use App\Models\Sectors;


class DashBoardController extends Controller
{
    public function Dashboard()//ไปหน้าแดชบอดแต่ละ ชนิดผู้ใช้
    {
      if(is_null(Auth::user())){
         return redirect()->back();
      }else{
         if(Auth::user()->type == 'admin'){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('admin/dashboard',$data);
         }else if(Auth::user()->type == 'user'){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('user/dashboard',$data);
         }else if(Auth::user()->type == 'planner'){
            $data['getRecord'] = User::find(Auth::user()->id);
            $employees = Employees::where('status', 2)
            ->whereIn('position_id', [11, 10])->get();
            $cartypes = Cartypes::where('status', 1)->get();
            $allowances = Allowances::where('status', 1)->get();
            $products = Products::where('status', 1)->get();
            $customers = Customers::where('status', 1)->get();
            $branchs = Branchs::where('status', 1)->get();
            $roads = Roads::all();
            $cars = Cars::all();
            $basket = Baskets::where('status', 1)->get();
            $sectors = Sectors::where('status',1)->get();

            return view('planner/employees/employee', $data,compact('employees', 
                                                            'cartypes',
                                                            'allowances',
                                                            'products',
                                                            'customers',
                                                            'branchs',
                                                            'roads',
                                                            'cars',
                                                            'basket',
                                                            'sectors'));
         }else{
            return redirect()->back();
         }
      }
       
    }
   
}
