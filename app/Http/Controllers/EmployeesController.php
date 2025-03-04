<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Http\Requests\StoreEmployeesRequest;
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

class EmployeesController extends Controller
{
    public function NewCreate()//ดึงtable ลองต่างๆไปแสดงในหน้าสมัคร
    {
        //ลงทะเบียนพนักงาน
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
        return view ('home/newregister',compact('prefixs',
                                                'positions',
                                                'psts',
                                                'typemilitarys',
                                                'divingcards',
                                                'cartypes',
                                                'typeeducations',
                                                'nationlitys',
                                                'races',
                                                'religions'));//ส่งข้อมูลไปหน้าveiwสมัครงาน

    }
    public function NewStore(Request $request)//บันทึกข้อมูลลงในdatabase
    {   
        try {
            // เพิ่มข้อมูลลงในตาราง Employees
            $employee = new Employees;
            $employee->date = $request->date;
            $employee->brithday = $request->brithday;
            $employee->prefix_id = $request->prefix;
            $employee->name = $request->name;
            $employee->nickname = $request->nickname;
            $employee->address = $request->address;
            $employee->cardaddress = $request->cardaddress;
            $employee->tel = $request->tel;
            $employee->idcard = $request->idcard;
            $employee->pobirth = $request->pobirth;
            $employee->age = $request->age;
            $employee->nationlity_id = $request->nationlity;
            $employee->race_id = $request->race;
            $employee->religion_id = $request->religion;
            $employee->psts_id = $request->psts;
            $employee->typemilitary_id = $request->typemilitary;
            $employee->divingcard_id = $request->divingcard;
            $employee->cartype_id = $request->cartype;
            $employee->position_id = $request->position;
            $employee->needsalary = $request->needsalary;
            $employee->towork = $request->towork;
            $employee->tyepeducation_id = $request->typeeducation;
            $employee->save();
    
            // การจัดการไฟล์ภาพ
            if ($request->hasFile('image')) {
                $filePath = public_path('uploads');
                $file = $request->file('image');
                $typefile = $file->getClientMimeType();
                $file_name = $employee->id . '.' . $file->getClientOriginalExtension();
                $file->move($filePath, $file_name);
                $employee->image = $file_name;
                $employee->save();
            }
    
            // เพิ่มข้อมูลลงในตาราง Childens
            $childen = new Childens;
            $childen->onchilden = $request->onchilden;
            $childen->stum = $request->stum;
            $childen->employee_id = $employee->id;
            $childen->save();
    
            // เพิ่มข้อมูลลงในตาราง Militarys
            $military = new Militarys;
            $military->datemilitary = $request->datemilitary;
            $military->employee_id = $employee->id;
            $military->save();
    
            // เพิ่มข้อมูลลงในตาราง AgeDivingcards
            $agedivingcard = new AgeDivingcards;
            $agedivingcard->yearstart = $request->caryearstart;
            $agedivingcard->yearend = $request->caryearend;
            $agedivingcard->employee_id = $employee->id;
            $agedivingcard->save();
    
            // เพิ่มข้อมูลลงในตาราง Jopps
            $jopp = new Jopps;
            $jopp->datejop = $request->datejop;
            $jopp->employee_id = $employee->id;
            $jopp->save();
    
            // เพิ่มข้อมูลลงในตาราง Cases
            $case = new Cases;
            $case->case = $request->case;
            $case->employee_id = $employee->id;
            $case->save();
    
            // เพิ่มข้อมูลลงในตาราง Vaccines
            $vaccine = new Vaccines;
            $vaccine->name1 = $request->vaccine1;
            $vaccine->name2 = $request->vaccine2;
            $vaccine->employee_id = $employee->id;
            $vaccine->save();
    
            // เพิ่มข้อมูลลงในตาราง Diseases
            $disease = new Diseases;
            $disease->name = $request->disease;
            $disease->employee_id = $employee->id;
            $disease->save();
    
            // เพิ่มข้อมูลลงในตาราง Addicteds
            $addicted = new Addicteds;
            $addicted->name = $request->addicted;
            $addicted->employee_id = $employee->id;
            $addicted->save();
    
            // เพิ่มข้อมูลลงในตาราง Educations
            $education = new Educations;
            $education->yearstart = $request->yearstart;
            $education->yearend = $request->yearend;
            $education->location = $request->location;
            $education->degree = $request->degree;
            $education->gpa = $request->gpa;
            $education->major = $request->major;
            $education->employee_id = $employee->id;
            $education->save();
    
            // เพิ่มข้อมูลลงในตาราง Acquaintances
            $acquaintance = new Acquaintances;
            $acquaintance->name = $request->acquaintance;
            $acquaintance->address = $request->addressacquaintance;
            $acquaintance->relation = $request->relation;
            $acquaintance->tel = $request->telacquaintance;
            $acquaintance->employee_id = $employee->id;
            $acquaintance->save();
    
            return redirect('/')->with('message', 'สมัครสมาชิกเสร็จสมบูรณ์');
        } catch (Exception $e) {
            // ถ้ามีข้อผิดพลาดเกิดขึ้น
            return redirect('/')->with('error', 'สมัครสมาชิกผิดพลาด: ' . $e->getMessage());
        }
    }
    public function NewShow(Employees $employees)//แสดงพนักงานทั้งหมด
    {
        //แสดงข้อมูล
        $employees = Employees::where('status',1)->get();
        return view('admin/waitingemployees/employees',compact('employees'));

    }
    public function NewShowFirst($id)//แสดงพนักงาน1คนตาม id ที่รับมา
    {
        //แสดงข้อมูล1คน
        $employee = Employees::where('id',$id)->first();//ดึงข้อมูลจากโมเดลEmployees
        return view('admin/waitingemployees/show',compact('employee'));  
    }
    public function NewEdit($id)//ดึงtable ลองต่างๆไปแสดงในหน้าแก้ไข
    {
        //แก้ไขข้อมูลพนักงาน
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

        return view('admin/waitingemployees/edit',compact('employee',
                                                        'prefixs',
                                                        'nationlitys',
                                                        'races',
                                                        'religions',
                                                        'positions',
                                                        'psts',
                                                        'typemilitarys',
                                                        'divingcards',
                                                        'cartypes',
                                                        'typeeducations'));
    }
    public function Newupdate(UpdateEmployeesRequest $request)//แก้ไข
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
        $employee->needsalary = $request->needsalary;//เก็บเงินเดือนที่ต้องการใส่ในdatabase
        $employee->towork = $request->towork;//เก็บเคยทำงานมาก่อนหรือไม่ใส่ในdatabase
        $employee->tyepeducation_id = $request->typeeducation;//เก็บประเภทการศึกษาใส่ในdatabase
        $employee->save();//save
        
        if ($request->hasfile('image')) {
            $filePath = public_path('uploads');
            file::delete($filePath .'/'. $employee->image);
           
            $filePath = public_path('uploads');
            $file = $request->file('image');
            $typefile = $file->getClientMimeType(); 
            if($typefile =='image/png'){
                $file_name = $employee->id.('.png');
            }else if($typefile =='image/jpg'){
                $file_name = $employee->id.('.jpg');
            }
            else if($typefile =='image/jpeg'){
                $file_name = $employee->id.('.jpeg');
            }
            $file->move($filePath, $file_name);
            $employee->image = $file_name;
           
        };
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

        return redirect('/ShowWaitting')->with('message','แก้ไขข้อมูลเสร็จสมบรูณ์');

    }
    public function NewDelete($id)//ลบ
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
        return back()->with('message','ลบข้อมูลเสร็จสมบรูณ์');
    }
    public function NewAdd($id)//ดึงtable ลองต่างๆไปแสดงในหน้าadd สมาชิกเข้าบริษัท
    {
        $employees = Employees::where('id',$id)->first();//ดึงข้อมูลจากโมเดลEmployees
        $companys = Companys::where('status', 1)->get();//ดึงข้อมูลจากโมเดลCompanys
        $positions = Positions::where('status',1)->get();//ดึงข้อมูลจากโมเดลPositions
        $mainlines = Maimlines::where('status',1)->get();//ดึงข้อมูลจากโมเดลPositions
        return view('/admin/waitingemployees/addmember',compact('companys',
                                                              'employees',
                                                              'positions',
                                                              'mainlines'));
    }
    public function NewUpdateEmployees(UpdateEmployeesRequest $request)//แก้ไข
    {   
        $request->validate([
            'company' => 'required',
            'position' => 'required',
            'mainline' => 'required',
            'salary' => 'required'],
            [
                'accountnumber.required' => 'กรุณาใส่เลขบัญชี',
                'company.required' => 'กรุณาเลือกบริษัท',
                'position.required' => 'กรุณาเลือกตำแหน่ง',
                'mainline.required' => 'กรุณาเลือกสายงาน',
                'salary.required' => 'กรุณาใส่เงินเดือน'
            ]
        );
        
        $employee = Employees::findOrfail($request->id);//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางEmployees
        $employee->name = $request->name;//เก็บบริษัทในdatabase
        $employee->company_id = $request->company;//เก็บบริษัทในdatabase
        $employee->position_id = $request->position;//เก็บตำแหน่งใส่ในdatabase
        $employee->mainline_id = $request->mainline;//เก็บหน้าที่ใส่ในdatabase
        $employee->status = 2;//เก็บหน้าที่ใส่ในdatabase
        $employee->save();//save

        $accountnumber = new Accountnumbers;//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางaccountnumber
        $accountnumber->name = $request->accountnumber;//เก็บเลขที่บัญชี
        $accountnumber->employee_id = $employee->id;//ส่งไปFK
        $accountnumber->save();//save

        $salary = new Salarys;//อ้างอิงไปโมเดลเก็บข้อมูลที่ตารางSalarys
        $salary->name = $request->salary;//เก็บเงินเดือน
        $salary->employee_id = $employee->id;//ส่งไปFK
        $salary->save();//save

        return redirect('/ShowWaitting')->with('message','กำหนดงานเสร็จสมบรูณ์');
    }
}
