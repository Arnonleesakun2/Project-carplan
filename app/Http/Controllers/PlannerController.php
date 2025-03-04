<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Cartypes;
use App\Models\Allowances;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Branchs;
use App\Models\Roads;
use App\Models\Cars;
use App\Models\Baskets;
use App\Models\Positions;
use App\Models\Companys;
use App\Models\Sectors;
class PlannerController extends Controller
{
    public function Editbasket(Request $request)//แก้ไขตระกร้า
    {
        $basket = Baskets::findOrfail($request->id);
        $basket->basketweight = $request->basketweight;
        $basket->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $basket, // ส่งข้อมูล basket ใหม่กลับ
        ]);
    }
    public function Storeallowance (Request $request)//เพิ่มข้อมูลเบี้ยเลี้ยง
    {
        $validatedData = $request->validate([
            'allowance' => 'required',
        ]);
        $allowance = new Allowances;
        $allowance->name = $request->allowance;//เก็บวันที่มาสมัครใส่ในdatabase
        $allowance->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $allowance, // ส่งข้อมูล allowance ใหม่กลับ
        ]);
    }
    public function AllowanceDelete($id)//ลบข้อมูลเบี้ยเลี้ยง
    {
        $allowance = Allowances::find($id);
        if ($allowance) {
            // ลบข้อมูล
            $allowance->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function Storeproduct (Request $request)//เพิ่มข้อมูลสินค้า
    {
        $validatedData = $request->validate([
            'product' => 'required',
            'weight' => 'required',
            'customer' => 'required',
        ]);
        $product = new Products;
        $product->product = $request->product;//เก็บสินค้าในdatabase
        $product->weight = $request->weight;//เก็บน้ำหนักdatabase
        $product->customer_id = $request->customer;//เก็บน้ำหนักdatabase
        $product->save();//save
        
        // ดึงข้อมูลลูกค้า
        $customer = Customers::find($request->customer);
        
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $product, // ข้อมูลสินค้าที่บันทึก
            'customer' => $customer, // ดึงชื่อลูกค้าจากตารางลูกค้า
        ]);
    }
    public function Editproduct (Request $request)//แก้ไขข้อมูลสินค้า
    {
        $product = Products::findOrfail($request->id);
        $product->product = $request->product;//เก็บสินค้าในdatabase
        $product->weight = $request->weight;//เก็บน้ำหนักdatabase
        $product->customer_id = $request->customer;//เก็บน้ำหนักdatabase
        $product->save();//save
        $customer = Customers::find($request->customer);
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $product, // ส่งข้อมูล Cartype ใหม่กลับ
            'customer' => $customer,
        ]);
    }
    public function ProductDelete($id)//ลบข้อมูลสินค้า
    {
        $product = Products::find($id);
        if ($product) {
            // ลบข้อมูล
            $product->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function Storecustomer (Request $request)//เพิ่มลูกค้า
    {
        $validatedData = $request->validate([
            'customer' => 'required',
        ]);
        $customer = new Customers;
        $customer->customer = $request->customer;//เก็บวันที่มาสมัครใส่ในdatabase
        $customer->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $customer, // ส่งข้อมูล customer ใหม่กลับ
        ]);
    }
    public function CustomerDelete($id)//ลบข้อมูลลูกค้า
    {
        $customer = Customers::find($id);
        if ($customer) {
            // ลบข้อมูล
            $customer->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function Storesector (Request $request)
    {
        $validatedData = $request->validate([
            'sector' => 'required',
        ]);
        $sector = new Sectors; 
        $sector->name = $request->sector;
        $sector->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $sector, // ส่งข้อมูล Cartype ใหม่กลับ
        ]);
    }
    public function SectorDelete ($id)
    {
        $sector = Sectors::find($id);
        if($sector){
            //ลบข้อมูล
            $sector->delete();
             // ส่งข้อมูลสำเร็จกลับไป
             return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        }else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function Storebranch (Request $request)//เพิ่มสาขา
    {
        $validatedData = $request->validate([
            'branch' => 'required',
            'customer' => 'required',
            'sector' => 'required',
        ]);
        $branch = new Branchs;
        $branch->branch = $request->branch;//เก็บวันที่มาสมัครใส่ในdatabase
        $branch->customer_id = $request->customer;//เก็บวันที่มาสมัครใส่ในdatabase
        $branch->sector_id = $request->sector;//เก็บวันที่มาสมัครใส่ในdatabase
        $branch->save();//save
        // ดึงข้อมูลลูกค้า
        $customer = Customers::find($request->customer);
         // ดึงข้อมูลภาค
        $sector = Sectors::find($request->sector);
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'branch' => $branch,
            'customer' => $customer,
            'sector' => $sector,
        ]);
    }
    public function SelectforBranch($id)
    {
        $branchs = Branchs::where('sector_id', $id)->with('customers', 'sectors')->get();
        return response()->json($branchs);
    }
    public function BranchDelete($id)//ลบสาขา
    {
        $branch = Branchs::find($id);
        if ($branch) {
            // ลบข้อมูล
            $branch->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function Storeroad (Request $request)//เพิ่มเส้นทาง
    {
        $validatedData = $request->validate([
            'road' => 'required',
            'time' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $road = new Roads;
        $road->road = $request->road;//เก็บวันที่มาสมัครใส่ในdatabase
        $road->time = $request->time;//เก็บวันที่มาสมัครใส่ในdatabase
        $road->lat = $request->lat;//เก็บวันที่มาสมัครใส่ในdatabase
        $road->lng = $request->lng;//เก็บวันที่มาสมัครใส่ในdatabase
        $road->status = 1;//เก็บวันที่มาสมัครใส่ในdatabase
        $road->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $road, // ส่งข้อมูล road ใหม่กลับ
        ]);
    }
    public function Editroad (Request $request)//แก้ไขเส้นทาง
    {
        $road = Roads::findOrfail($request->id);
        $road->road = $request->road;//เก็บdatabase
        $road->time = $request->time;//เก็บdatabase
        $road->lat = $request->lat;//เก็บdatabase
        $road->lng = $request->lng;//เก็บdatabase
        $road->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $road, // ส่งข้อมูล Cartype ใหม่กลับ
        ]);
    }
    public function RoadDelete($id)//ลบเส้นทาง
    {
        $road = Roads::find($id);
        if ($road) {
            // ลบข้อมูล
            $road->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function RoadUpdateStatus (Request $request)//เปลี่ยนสถานะข้อมูลรถ
    {
        $road = Roads::find($request->id);
        if ($road) {
            $road->status = $request->status;
            $road->save();

            return response()->json(['success' => true, 'message' => 'อัปเดตสถานะสำเร็จ']);
        }

        return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล']);
    }
    public function Storecartype (Request $request)//เพิ่มข้อมูลชนิดรถ
    {
        $validatedData = $request->validate([
            'cartype' => 'required',
        ]);
        $cartype = new Cartypes;
        $cartype->name = $request->cartype;//เก็บวันที่มาสมัครใส่ในdatabase
        $cartype->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $cartype, // ส่งข้อมูล Cartype ใหม่กลับ
        ]);
    }
    public function CartypeDelete($id)//ลบข้อมูลชนิด
    {
        $cartype = Cartypes::find($id);
        if ($cartype) {
            // ลบข้อมูล
            $cartype->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function Storecar (Request $request)//เพิ่มรถ
    {
        $validatedData = $request->validate([
            'license' => 'required',
            'number' => 'required',
            'size' => 'required',
            'weight' => 'required',
        ]);
        $car = new Cars;
        $car->license = $request->license;//เก็บวันที่มาสมัครใส่ในdatabase
        $car->number = $request->number;//เก็บวันที่มาสมัครใส่ในdatabase
        $car->cartype_id = $request->size;//เก็บวันที่มาสมัครใส่ในdatabase
        $car->weight = $request->weight;//เก็บวันที่มาสมัครใส่ในdatabase
        $car->status = 1;
        $car->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => [
                    'id' => $car->id,
                    'license' => $car->license,
                    'number' => $car->number,
                    'size' => $car->cartypes->name, // ส่งชื่อของ cartype
                    'weight' => $car->weight,
                    'status' => $car->status,
            ],
        ]);
    }
    public function Editcar (Request $request)//แก้ไขรถ
    {
        $car = Cars::findOrfail($request->id);
        $car->license = $request->license;//เก็บสินค้าในdatabase
        $car->number = $request->number;//เก็บน้ำหนักdatabase
        $car->cartype_id = $request->size;//เก็บน้ำหนักdatabase
        $car->weight = $request->weight;//เก็บน้ำหนักdatabase
        $car->save();//save
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => [
                    'id' => $car->id,
                    'license' => $car->license,
                    'number' => $car->number,
                    'size' => $car->cartypes->name, // ส่งชื่อของ cartype
                    'weight' => $car->weight,
            ],

        ]);
    }
    public function CarDelete($id)//ลบข้อมูลรถ
    {
        $car = Cars::find($id);
        if ($car) {
            // ลบข้อมูล
            $car->delete();
    
            // ส่งข้อมูลสำเร็จกลับไป
            return response()->json([
                'success' => true,
                'message' => 'ลบข้อมูลเสร็จสิ้น',
            ]);
        } else {
            // ส่งข้อมูลไม่พบกลับไป
            return response()->json([
                'success' => false,
                'message' => 'ไม่มีข้อมูลให้ลบ',
            ]);
        }
    }
    public function CarUpdateStatus (Request $request)//เปลี่ยนสถานะข้อมูลรถ
    {
        $car = Cars::find($request->id);
        if ($car) {
            $car->status = $request->status;
            $car->save();

            return response()->json(['success' => true, 'message' => 'อัปเดตสถานะสำเร็จ']);
        }

        return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล']);
    }
}
