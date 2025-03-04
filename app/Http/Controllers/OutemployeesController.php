<?php

namespace App\Http\Controllers;

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
use App\Models\Outsts;

class OutemployeesController extends Controller
{
    public function SelectOut($id)//ไปหน้าให้เลือกการพ้นสภาพพนักงาน
    {
        $employee = Employees::where('id',$id)->first();
        $outsts = Outsts::all();
        return view('admin/outemployees/select',compact('outsts','employee'));
    }
    public function Select(Request $request)//เลือกการพ้นสภาพ
    {
        $request->validate([
            'outsts' => 'required'
        ],
        [
            'outsts.required' => 'กรุณากรอกเลือกข้อมูล'
        ]);
        $employee = Employees::findOrFail($request->id);
        $employee->outsts_id = $request->outsts;
        $employee->status = 0;
        $employee->save();
        return redirect('/Employees')->with('message','พ้นสภาพพนักงานเสร็จสมบูรณ์');
    }
    public function OutEmployees ()//แสดงพนักงานที่พ้นสภาพ
    {
        $employees = Employees::where('status',0)->get();
        return view ('admin/outemployees/employees',compact('employees'));
    }
    public function BackOut($id)//เข้าบริษัท
    {
        $employee = Employees::findOrfail($id);//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางEmployees
        $employee->status = 2;//เก็บหน้าที่ใส่ในdatabase t
        $employee->save();//save

        return back()->with('message','เพื่มพนักงานเข้าบริษัทเสร็จสิ้น');
    }
    public function OutInfo($id)
    {
        $employee = Employees::where('id',$id)->first();//ดึงข้อมูลจากโมเดลEmployees
        return view('admin/outemployees/info',compact('employee'));
    }
    public function OutEdit($id)//ดึงtable ลองต่างๆไปแสดงในหน้าแก้ไขsp
    {
        $employee = Employees::where('id',$id)->first();//ดึงข้อมูลจากโมเดลEmployees
        $prefixs = Prefixs::where('status', 1)->get();//ดึงข้อมูลจากโมเดลPrefixs
        $nationlitys = Nationalitys::where('status',1)->get();//ดึงข้อมูลจากโมเดลNationalitys
        $races = Races::where('status',1)->get();//ดึงข้อมูลจากโมเดลRaces
        $religions = Religions::where('status',1)->get();//ดึงข้อมูลจากโมเดลReligions
        $positions = Positions::where('status',1)->get();//ดึงข้อมูลจากโมเดลPositions
        $psts = Psts::where('status',1)->get();///ดึงข้อมูลจากโมเดลPsts
        $typemilitarys = Typemilitarys::where('status',1)->get();//Typemilitarys
        $divingcards = Divingcards::where('status',1)->get();//ดึงข้อมูลจากโมเดลDivingcards
        $cartypes = Cartypes::where('status',1)->get();//ดึงข้อมูลจากโมเดลCartypes
        $typeeducations = TypeEducations::where('status',1)->get();//ดึงข้อมูลจากโมเดลTypeEducations
        $mainlines = Maimlines::where('status',1)->get();//ดึงข้อมูลจากโมเดลMaimlines
        $companys = Companys::where('status',1)->get();//ดึงข้อมูลจากโมเดลMaimlines
        $outsts = Outsts::where('status',1)->get();//ดึงข้อมูลจากโมเดลOutsts
        return view('admin/outemployees/edit',compact('employee',
                                                        'prefixs',
                                                        'nationlitys',
                                                        'races',
                                                        'religions',
                                                        'positions',
                                                        'psts',
                                                        'typemilitarys',
                                                        'divingcards',
                                                        'cartypes',
                                                        'typeeducations',
                                                        'mainlines',
                                                        'companys',
                                                        'outsts'));
    }
    public function OutUpdate(UpdateEmployeesRequest $request)//แก้ไข
    {
        //อัปเดทใส่database
        $employee = Employees::findOrfail($request->id);
        $employee->date = $request->date;//เก็บวันที่มาสมัครใส่ในdatabase
        $employee->brithday = $request->brithday;//เก็บวันเกิดใส่ในdatabase
        $employee->prefix_id = $request->prefix;//เก็บคำนำหน้าใส่ในdatabase
        $employee->name = $request->name;//เก็บชื่อนามสกุลใส่ในdatabase
        $employee->nickname = $request->nickname;//เก็บชื่อเล่นใส่ในdatabase
        $employee->address = $request->address;//เก็บที่อยู่ปัจจุบันใส่ในdatabase
        $employee->cardaddress = $request->cardaddress;//เก็บที่อยู่ตามบัตรใส่ในdatabase
        $employee->tel = $request->tel;//เก็บเบอร์โทรใส่ในdatabase
        $employee->idcard = $request->idcard;//เก็บบัตรประชาชนใส่ในdatabase
        $employee->pobirth = $request->pobirth;//เก็บจังหวัดทีเกิดใส่ในdatabase
        $employee->age = $request->age;//เก็บอายุใส่ในdatabase
        $employee->nationlity_id = $request->nationlity;//เก็บสัญชาติใส่ในdatabase
        $employee->race_id = $request->race;//เก็บเชื้อชาติใส่ในdatabase
        $employee->religion_id = $request->religion;//เก็บศาสนาใส่ในdatabase
        $employee->psts_id = $request->psts;//เก็บสถานะภาพใส่ในdatabase
        $employee->typemilitary_id = $request->typemilitary;//เก็บประเภทการเกณทหารใส่ในdatabase
        $employee->divingcard_id = $request->divingcard;//เก็บชนิดใบขับขี่ใส่ในdatabase
        $employee->cartype_id = $request->cartype;//เก็บชนิดรถใส่ในdatabase
        $employee->position_id = $request->position;//เก็บตำแหน่งใส่ในdatabase
        $employee->towork = $request->towork;//เก็บเคยทำงานมาก่อนหรือไม่ใส่ในdatabase
        $employee->tyepeducation_id = $request->typeeducation;//เก็บประเภทการศึกษาใส่ในdatabase
        $employee->mainline_id = $request->mainline;//เก็บหน้าที่ใส่ในdatabase
        $employee->company_id = $request->company;//เก็บหน้าที่ใส่ในdatabase
        $employee->outsts_id = $request->outsts;//เก็บหน้าที่ใส่ในdatabase
        $employee->save();//save

        $childen = Childens::where('employee_id',$request->id)->first();//แว employee_id ของ  ตาราง childen = id ของ ตาราง employee
        $childen->onchilden = $request->onchilden;//เก็บจำนวนบุตร
        $childen->stum = $request->stum;//เก็บบุตรที่ศึกษาอยู่
        $childen->employee_id = $employee->id;//ส่งไปFK
        $childen->save();//save

        $military = Militarys::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางMilitarys
        $military->datemilitary = $request->datemilitary;//เก็บวันเกณฑ์ทหาร
        $military->employee_id = $employee->id;//ส่งไปFK
        $military->save();//save


        $agedivingcard = AgeDivingcards::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางAgeDivingcards
        $agedivingcard->yearstart = $request->caryearstart;//เก็บวันอนุญาตใบขับขี่่
        $agedivingcard->yearend = $request->caryearend;//เก็บวันสิ้นอายุใบขับขี่่
        $agedivingcard->employee_id = $employee->id;//ส่งไปFK
        $agedivingcard->save();//save

        $jopp = Jopps::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางJops
        $jopp->datejop = $request->datejop;//เก็บวันสิ้นอายุใบขับขี่่
        $jopp->employee_id = $employee->id;//ส่งไปFK
        $jopp->save();//save

        $case = Cases::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางCases
        $case->case = $request->case;//เก็บท่านเคยมีส่วนในคดีเพ่งหรือ คดีอาญาหรือไม่
        $case->employee_id = $employee->id;//ส่งไปFK
        $case->save();//save


        $vaccine = Vaccines::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางVaccines
        $vaccine->name1 = $request->vaccine1;//เก็บวัคซีน1
        $vaccine->name2 = $request->vaccine2;//เก็บวัคซีน2
        $vaccine->employee_id = $employee->id;//ส่งไปFK
        $vaccine->save();//save

        $disease = Diseases::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางDiseases
        $disease->name = $request->disease;//เก็บเคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่
        $disease->employee_id = $employee->id;//ส่งไปFK
        $disease->save();//save

        $addicted = Addicteds::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางAddicteds
        $addicted->name = $request->addicted;//เก็บเคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่
        $addicted->employee_id = $employee->id;//ส่งไปFK
        $addicted->save();//save

        $education = Educations::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางEducations
        $education->yearstart = $request->yearstart;//แก็บตั่งแต่ปี
        $education->yearend = $request->yearend;//เก็บถึงปี
        $education->location = $request->location;//สถารศึกษา/ที่ตั่ง
        $education->degree = $request->degree;//วุฒิที่ได้รับ
        $education->gpa = $request->gpa;//เกรดเฉลี่ยรวม
        $education->major = $request->major;//วิชาเอก
        $education->employee_id = $employee->id;//ส่งไปFK
        $education->save();//save

        $acquaintance = Acquaintances::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางAcquaintances
        $acquaintance->name = $request->acquaintance;//ชื่อ-นามสกุล
        $acquaintance->address = $request->addressacquaintance;//ที่อยู่
        $acquaintance->relation = $request->relation;//เก็บความสัมพันธ์
        $acquaintance->tel = $request->telacquaintance;//เบอร์โทร
        $acquaintance->employee_id = $employee->id;//ส่งไปFK
        $acquaintance->save();//save

        $salary = Salarys::where('employee_id',$request->id)->first();//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางMaimline
        $salary->name = $request->salary;//เงินเดือน
        $salary->employee_id = $employee->id;//ส่งไปFK
        $salary->save();//save




        return redirect('/OutEmployees')->with('message','แก้ไขข้อมูลเสร็จสมบรูณ์');

    }
    public function OutDelete($id)//ลบ
    {
        //ลบข้อมูลทิ้ง
        $employee = Employees::findOrfail($id);
        $filePath = public_path('uploads');     
        file::delete($filePath .'/'. $employee->image);
        $employee->delete();
        $acquaintances = Acquaintances::where('employee_id',$id)->delete();
        $case = Cases::where('employee_id',$id)->delete();
        $agedivingcard = Agedivingcards::where('employee_id',$id)->delete();
        $childen = Childens::where('employee_id',$id)->delete();
        $disease = Diseases::where('employee_id',$id)->delete();
        $addicted = Addicteds::where('employee_id',$id)->delete();
        $education = Educations::where('employee_id',$id)->delete();
        $jopp = Jopps::where('employee_id',$id)->delete();
        $military = Militarys::where('employee_id',$id)->delete();
        $vaccine = Vaccines::where('employee_id',$id)->delete();
        $accountnumber = Accountnumbers::where('employee_id',$id)->delete();
        $salary = Salarys::where('employee_id',$id)->delete();
        return redirect('/OutEmployees')->with('message','ลบข้อมูลเสร็จสมบรูณ์');
    }
}
