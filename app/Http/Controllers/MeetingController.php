<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
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
use App\Models\Employee_Meetings;

class MeetingController extends Controller
{
    public function Meeting()//แสดงหน้ารายการประชุม
    {
        $meetings = Meetings::where('status',1)->get();
        return view ('admin/meetings/meeting',compact('meetings'));
    }
    public function CreateMeeting(Request $request)//นำข้อมูลไปเก็บdatabase
    {
        if(!$request->topic){
            return redirect()->back()->with('error','กรุณาหัวข้อ');
        }else if(!$request->organizer){
            return redirect()->back()->with('error','กรุณากรอกผู้จัด');
        }else if(!$request->datemeeting){
            return redirect()->back()->with('error','กรุณากรอกวันที่');
        }else{
            //เพิ่มเข้าdatabase
            $meeting = new Meetings;//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางemployee
            $meeting->topic = $request->topic;//เก็บภาพใส่ในdatabase
            $meeting->organizer = $request->organizer;//เก็บภาพใส่ในdatabase
            $meeting->date = $request->datemeeting;//เก็บภาพใส่ในdatabase
            $meeting->save();//save
    
            return redirect ('/Meeting')->with('message','เพิ่มข้อมูลเสร็จสมบูรณ์');
        }
    }
    public function Check($id)//ดูสมาชิก
    {
        $employeemeetings = Employee_Meetings::where('meeting_id',$id)->get();
        return view('admin/meetings/check',compact('employeemeetings'));
    }
    public function DeleteMeeting($id)//ลบการประชุม
    {
        $employeemeetings = Employee_Meetings::where('meeting_id',$id)->first();
        if(is_null($employeemeetings)){
            $meeting = Meetings::where('id',$id)->delete(); 
            return redirect()->back()->with('message','ลบข้อมูลเสร็จสมบูรณ์'); 
        }else{
            $meeting = Meetings::where('id',$id)->delete(); 
            $filePath = public_path('signature');
            file::delete($filePath .'/'. $employeemeetings->image);
            $employeemeetings->delete();
            return redirect()->back()->with('message','ลบข้อมูลเสร็จสมบูรณ์');
        }
    }
    public function DeleteUser($id)//ลบสมาชิก
    {
        
        $employeemeetings = Employee_Meetings::where('employee_id',$id)->first();  
        $filePath = public_path('signature');     
        file::delete($filePath .'/'. $employeemeetings->image);
        $employeemeetings->delete();
        return redirect()->back()->with('message','ลบข้อมูลเสร็จสมบูรณ์');
    }
}