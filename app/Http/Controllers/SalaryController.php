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

class SalaryController extends Controller
{
    
    public function AddAccountnumber ($id)//แสดงหน้าแก้ไขเลขบัญชี
    {
        $accountnumber = Accountnumbers::where('employee_id',$id)->get();
        return view ('/admin/salarys/addaccountnumber',compact('accountnumber'));
    }
    public function UpdateAccountnumber(Request $Request)//แก้ไขเลขบัญชี
    {
        $Request->validate([
            'accountnumber' => 'required'
        ],
        [
            'accountnumber.required' => 'กรูุณากรอกเลขบัญชี'
        ]);

        $accountnumber = Accountnumbers::where('employee_id',$Request->id)->first();
        $accountnumber->name = $Request->accountnumber;
        $accountnumber->save();//save
        return redirect('/Employees')->with('message','แก้ไขเลขบัญชีเสร็จสมบูรณ์');
    }
    public function CalSalary($id)//แสดงหน้าคำนวณเงินเดือน
    {
        $employee = Employees::where('id',$id)->first();
        return view('/admin/salarys/calsalary',compact('employee'));
    }
    public function Cal(Request $request)//คำนวณเงินเดือน
    {
        $request->validate([
            'name' => 'required',
            'salary' => 'required',
            'datecal' => 'required',
            'total' => 'required' 
            ],
            [
            'name.required'=>'กรุณาใส่ชื่อ',
            'salary.required'=>'กรุณใส่เงินเดือน',
            'datecal.required'=>'กรุณาใส่วันที่',
            'total.required'=>'กรุณาคลิกคำนวณเงินเดือน'
            ]);
        $employee = Employees::findOrfail($request->id);//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางEmployees
        $employee->name = $request->name;//เก็บบริษัทในdatabase
        $employee->save();//save

        $salary = Salarys::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางJops
        $salary->name = $request->salary;//เก็บวันสิ้นอายุใบขับขี่่
        $salary->save();//save

        $reportsalary = new Reportsalarys;//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางaccountnumber
        $reportsalary->datecal = $request->datecal;//เก็บเลขที่บัญชี
        $reportsalary->bonus = $request->bonus;//เก็บเลขที่บัญชี
        $reportsalary->missingwork = $request->missingwork;//เก็บเลขที่บัญชี
        $reportsalary->lostproduct = $request->lostproduct;//เก็บเลขที่บัญชี
        $reportsalary->poicefine = $request->poicefine;//เก็บเลขที่บัญชี
        $reportsalary->transportfine	 = $request->transportfine;//เก็บเลขที่บัญชี
        $reportsalary->welfareloan = $request->welfareloan;//เก็บเลขที่บัญชี
        $reportsalary->ava = $request->ava;//เก็บเลขที่บัญชี
        $reportsalary->drivinginsurance = $request->drivinginsurance;//เก็บเลขที่บัญชี
        $reportsalary->storefront = $request->storefront;//เก็บเลขที่บัญชี
        $reportsalary->total	= $request->total;//เก็บเลขที่บัญชี

        $reportsalary->employee_id = $employee->id;//ส่งไปFK
        $reportsalary->save();//save

        return redirect('/Employees')->with('message','คำนวณเสร็จสมบรูณ์');
    }
    public function ReportSalary (Request $request)//แสดงหน้ารายงานเงินเดือน
    {
        $reports = Reportsalarys::all();
        return view ('/admin/salarys/report',compact('reports'));
    }
    public function Delete(Request $request)//ดึงtable ลองต่างๆไปแสดงในหน้าแก้ไขsp
    {
       $report = Reportsalarys::where('id',$request->id)->delete();
       return redirect()->back()->with('message','ลบข้อมูลเสร็จสมบูรณ์');
    }
    
}
