<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Employees;
use App\Models\Cartypes;
use App\Models\Allowances;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Branchs;
use App\Models\Roads;
use App\Models\Cars;
use App\Models\Baskets;
use App\Models\Sectors;
use Illuminate\Support\Facades\Log;


class DashBoardController extends Controller
{
   public function Dashboard() //ไปหน้าแดชบอดแต่ละ ชนิดผู้ใช้
   {
      try {
         if (is_null(Auth::user())) {
            return redirect()->back();
         } else {
            if (Auth::user()->type == 'admin') {
               $data['getRecord'] = User::find(Auth::user()->id);
               return view('admin/dashboard', $data);
            } else if (Auth::user()->type == 'user') {
               $data['getRecord'] = User::find(Auth::user()->id);
               return view('user/dashboard', $data);
            } else if (Auth::user()->type == 'planner') {
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
               $sectors = Sectors::where('status', 1)->get();
   
               return view('planner/employees/employee', $data, compact(
                  'employees',
                  'cartypes',
                  'allowances',
                  'products',
                  'customers',
                  'branchs',
                  'roads',
                  'cars',
                  'basket',
                  'sectors'
               ));
            } else {
               return redirect()->back();
            }
         }
      } catch (\Exception $e) {
         Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
        return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
      }
      
   }
}
