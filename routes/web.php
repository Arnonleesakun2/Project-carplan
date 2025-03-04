<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OldEmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\OutemployeesController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMeetingController;
use App\Http\Controllers\PlannerController;
use App\Http\Controllers\CarPlannerController;

Route::group(['middleware' => 'admin'], function () { //admin
    Route::controller(DashBoardController::class)->group(function () {
        Route::get('/AdminDashBoard', 'Dashboard');
    });
    Route::controller(OldEmployeeController::class)->group(function () {
        //----------------------------หน้าสมาชิกทั้งหมด   
        Route::get('/Employees', 'Employee'); //หน้าสมาชิกทั้งหมด
        Route::get('/EmployeeInfo/{id}', 'EmployeeInfo'); //แสดงข้อมูลสมาชิก
        Route::get('/EmployeeEdit/{id}', 'EmployeeEdit'); //หน้าแก้ไขข้อมูล
        Route::patch('/EmployeeUpdate', 'EmployeeUpdate'); //แก้ไข
        Route::get('/EmployeeOut/{id}', 'EmployeeOut'); //เปลี่ยนสถานะไปพ้นสภาพ
        //----------------------------เลือกบริษัท
        Route::get('/select', 'SelectCompany'); //เลือกบริษัท
        //----------------------------ฟังชั่นsearch
        Route::get('/search', 'search'); //ฟังชั่นsearch
        //----------------------------เพิ่มลบบริษัท    
        Route::post('/AddCompany', 'CreateCompany');
        Route::post('/DeleteCompany', 'DeleteCompany');
    });
    Route::controller(SalaryController::class)->group(function () {
        //----------------------------เพิ่มหมายเลขบัญชี    
        Route::get('/AddAccountnumber/{id}', 'AddAccountnumber'); //แสดงหน้า
        Route::patch('/UpdateAccountnumber', 'UpdateAccountnumber'); //แก้ไข
        //----------------------------คำนวณเงินเดือน
        Route::get('/CalSalary/{id}', 'CalSalary'); //แสดงหน้าคำนวณเงินเดือน
        Route::patch('/Cal', 'Cal'); //คำนวณเงินเดือน
        //----------------------------ออกรายงาน
        Route::get('/ReportSalary', 'ReportSalary'); //แสดงหน้ารายงานเงินเดือน
        Route::get('/DeleteSalary/{id}', 'Delete'); //ลบ

    });
    Route::controller(OutemployeesController::class)->group(function () {
        //----------------------------หน้าเลือกสถานะพ้นสภาพ
        Route::get('/SelectOut/{id}', 'SelectOut');
        Route::patch('/Select', 'Select');
        //----------------------------หน้าพนักงานพ้นสภาพ
        Route::get('/OutEmployees', 'OutEmployees');

        //----------------------------เพิ่มเข้าบริษัท
        Route::get('/BackOut/{id}', 'BackOut');
        //----------------------------แสดงข้อมูล
        Route::get('/OutInfo/{id}', 'OutInfo');
        //----------------------------แก้ไข
        Route::get('/OutEdit/{id}', 'OutEdit');
        Route::patch('/OutUpdate', 'OutUpdate');
        //----------------------------ลบ
        Route::get('/OutDelete/{id}', 'OutDelete');
    });
    Route::controller(MeetingController::class)->group(function () {
        Route::get('/Meeting', 'Meeting'); //หน้าประชุม
        Route::post('/CreateMeeting', 'CreateMeeting'); //นำข้อมูลเข้า่database
        Route::get('/DeleteMeeting/{id}', 'DeleteMeeting'); //ลบรายกานประชุม
        Route::get('/Check/{id}', 'Check'); //แสดงรายชื่อผู้เข้าประชุม
        Route::get('/DeleteUser/{id}', 'DeleteUser'); //แสดงรายชื่อผู้เข้าประชุม
    });
    Route::controller(FullCalenderController::class)->group(function () {
        Route::get('/FullCalender', 'FullCalender'); //แสดงปฏิทิน
        Route::view('/AddSchedule', 'admin/calenders/add'); //ไปหน้าเพิ่มข้อมูลปฏิทิน
        Route::post('/CreateSchedule', 'Create'); //เพิ่มข้อมูลปฏิทิน
        Route::get('/GetEvents', 'GetEvents'); //แสดงข้อมูลปฏิทิน
        Route::get('/Delete/{id}', 'DeleteEvent'); //ลบข้อมูลปฏิทิน
        Route::post('/UpdateSchedule/{id}', 'Update'); //แก้ไข
        Route::post('/Events/{id}/Resize', 'Resize'); //ลดขยายเวลา
    });
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/register', 'register');
        Route::post('/register_post', 'register_post')->name('register');
    });
    Route::controller(EmployeesController::class)->group(function () {
        Route::get('/ShowWaitting', 'NewShow'); //หน้าแสดงข้อมูลพนักงานที่สมัคร
        Route::get('/ShowFirst/{id}', 'NewShowFirst'); //หน้าแสดงข้อมูลตามไอดีที่ส่ง
        Route::get('/NewEdit/{id}', 'NewEdit'); //หน้าแสดงแก้ไขข้อมูลพนักงานที่สมัคร
        Route::patch('/Newupdate', 'Newupdate'); //แก้ไข
        Route::get('/NewDelete/{id}', 'NewDelete'); //ลบข้อมูลพนักงานไหม่
        Route::get('/NewAdd/{id}', 'NewAdd'); //ไปหน้าสมาชิกเข้าบริษัท ตามแต่ละid
        Route::patch('/NewUpdateEmployees', 'NewUpdateEmployees'); //เพิ่มสมาชิกเข้าบริษัท
    });
});



Route::group(['middleware' => 'user'], function () { //user
    Route::controller(DashBoardController::class)->group(function () {
        Route::get('/UserDashBoard', 'Dashboard');
    });
    Route::controller(UserController::class)->group(function () {
        //-----------ข้อมูล
        Route::get('/UserInfo', 'UserInfo');
    });
    Route::controller(UserMeetingController::class)->group(function () {
        //-----------ประชุม
        Route::get('/UserMeeting', 'UserMeeting');
        //-----------เข้าร่วมการประชุม
        Route::get('/AddUser/{id}', 'AddUser');
        Route::post('/AddUserUpdate', 'AddUserUpdate');
    });
});

Route::group(['middleware' => 'planner'], function () { //user
    Route::controller(DashBoardController::class)->group(function () {
        Route::get('/PlannerDashBoard', 'Dashboard');
    });
    Route::controller(PlannerController::class)->group(function () {
        Route::get('/PlannerManagement', 'PlannerManagement'); //แสดงชื่อพนักงานขับรถ
        Route::patch('/Editbasket', 'Editbasket'); //แก้ไขตะกร้า
        Route::post('/Storeallowance', 'Storeallowance'); //เพิ่มเบี้ยเลี้ยง
        Route::delete('/AllowanceDelete/{id}', 'AllowanceDelete'); //ลบเบี้ยเลี้ยง
        Route::post('/Storeproduct', 'Storeproduct'); //เพิ่มเสินค้า
        Route::patch('/Editproduct', 'Editproduct'); //แก้ไขสินค้า
        Route::delete('/ProductDelete/{id}', 'ProductDelete'); //ลบชนิดสินค้า
        Route::post('/Storecustomer', 'Storecustomer'); //เพิ่มลูกค้า
        Route::delete('/CustomerDelete/{id}', 'CustomerDelete'); //ลบลูกค้า
        Route::post('/Storesector', 'Storesector'); //เพิ่มภาค
        Route::delete('/SectorDelete/{id}', 'SectorDelete'); //ลบภาค
        Route::post('/Storebranch', 'Storebranch'); //เพิ่มสาขา
        Route::get('/SelectforBranch/{id}', 'SelectforBranch'); //เลือกข้อมูลที่จะแสดง
        Route::delete('/BranchDelete/{id}', 'BranchDelete'); //ลบสาขา
        Route::post('/Storeroad', 'Storeroad'); //เพิ่มเส้นทาง
        Route::patch('/Editroad', 'Editroad'); //แก้ไขเส้นทาง
        Route::delete('/RoadDelete/{id}', 'RoadDelete'); //ลบเส้นทาง
        Route::post('/RoadUpdateStatus', 'RoadUpdateStatus'); //เปลี่ยนสถานะเส้นทาง
        Route::post('/Storecartype', 'Storecartype'); //เพิ่มชนิดของรถ
        Route::delete('/CartypeDelete/{id}', 'CartypeDelete'); //ลบชนิดของรถ
        Route::post('/Storecar', 'Storecar'); //เพิ่มรถ
        Route::patch('/Editcar', 'Editcar'); //แก้ไขรถ
        Route::delete('/CarDelete/{id}', 'CarDelete'); //ลบรถ
        Route::post('/CarUpdateStatus', 'CarUpdateStatus'); //เปลี่ยนสถานะรถ
    });
    Route::controller(CarPlannerController::class)->group(function () {
        Route::get('/CarPlanner', 'CarPlanner'); //ไปหน้าจัดแพนรถ
        Route::get('/GetBranchsByCustomer/{id}', 'GetBranchsByCustomer'); //แสดงสาขาของแค่ลูกค้าคนนี้
        Route::get('/GetProductsByCustomer/{id}', 'GetProductsByCustomer'); //แสดงสินค้าของแค่ลูกค้าคนนี้
        Route::post('/StoreCarPlanner', 'StoreCarPlanner'); //เพิ่มแพนรถ
        Route::get('/CarPlannerReport', 'CarPlannerReport'); //ไปหน้ารีพอด
        Route::get('/EditPlanner/{id}', 'EditPlanner'); //ไปหน้าแก้ไขแพน
        Route::patch('/UpdateCarPlanner', 'UpdateCarPlanner'); //แก้ไขแพน
        Route::get('/DeletePlanner/{id}', 'DeletePlanner'); //ลบแพน
        Route::get('/PrintPlanner/{id}', 'PrintPlanner'); //แสดงแพน
        Route::get('/PrintPlannerPdf/{id}','PrintPlannerPdf'); //PDF
    });
});



Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index'); //หน้าlogin
    Route::post('/login_post', 'login_post'); //login
    Route::get('/Logout', 'Logout'); //logout
});
Route::controller(EmployeesController::class)->group(function () {
    Route::get('/NewRegister', 'NewCreate'); //หน้าลงทะเบียน
    Route::post('/StoreNewEmployees', 'NewStore'); //นำข้อมูลเข้า่database

});
