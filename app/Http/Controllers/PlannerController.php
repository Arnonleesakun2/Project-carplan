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
use App\Models\Sectors;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Log;

class PlannerController extends Controller
{
    public function EmployeeExportpdf() //สร้าง PDF พนักงาน
    {
        try {
            $employees = Employees::whereIn('position_id', [11, 10])->get(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.employee.PDF', compact('employees'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Editbasket(Request $request) //แก้ไขตระกร้า
    {
        try {
            $basket = Baskets::findOrfail($request->id);
            $basket->basketweight = $request->basketweight;
            $basket->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $basket, // ส่งข้อมูล basket ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storeallowance(Request $request) //เพิ่มข้อมูลเบี้ยเลี้ยง
    {
        try {
            $allowance = new Allowances;
            $allowance->name = $request->allowance; //เก็บวันที่มาสมัครใส่ในdatabase
            $allowance->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $allowance, // ส่งข้อมูล allowance ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function AllowanceDelete($id) //ลบข้อมูลเบี้ยเลี้ยง
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function AllowanceExportpdf() //สร้าง PDF เบี้ยเลี้ยง
    {
        try {
            $allowances = Allowances::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.allowances.PDF', compact('allowances'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storeproduct(Request $request) //เพิ่มข้อมูลสินค้า
    {
        try {
            $product = new Products;
            $product->product = $request->product; //เก็บสินค้าในdatabase
            $product->weight = $request->weight; //เก็บน้ำหนักdatabase
            $product->customer_id = $request->customer; //เก็บน้ำหนักdatabase
            $product->save(); //save

            // ดึงข้อมูลลูกค้า
            $customer = Customers::find($request->customer);

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $product, // ข้อมูลสินค้าที่บันทึก
                'customer' => $customer, // ดึงชื่อลูกค้าจากตารางลูกค้า
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Editproduct(Request $request) //แก้ไขข้อมูลสินค้า
    {
        try {
            $product = Products::findOrfail($request->id);
            $product->product = $request->product; //เก็บสินค้าในdatabase
            $product->weight = $request->weight; //เก็บน้ำหนักdatabase
            $product->customer_id = $request->customer; //เก็บน้ำหนักdatabase
            $product->save(); //save
            $customer = Customers::find($request->customer);
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $product, // ส่งข้อมูล Cartype ใหม่กลับ
                'customer' => $customer,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function ProductDelete($id) //ลบข้อมูลสินค้า
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function ProductExportpdf() //สร้าง PDF สินค้า
    {
        try {
            $products = Products::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.products.PDF', compact('products'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storecustomer(Request $request) //เพิ่มลูกค้า
    {
        try {
            $customer = new Customers;
            $customer->customer = $request->customer; //เก็บวันที่มาสมัครใส่ในdatabase
            $customer->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $customer, // ส่งข้อมูล customer ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CustomerDelete($id) //ลบข้อมูลลูกค้า
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CustomerExportpdf() //สร้าง PDF ลูกค้า
    {
        try {
            $customers = Customers::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.customers.PDF', compact('customers'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storesector(Request $request) //เพิ่มภาค
    {
        try {
            $sector = new Sectors;
            $sector->name = $request->sector;
            $sector->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $sector, // ส่งข้อมูล Cartype ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function SectorDelete($id) //ลบภาค
    {
        try {
            $sector = Sectors::find($id);
            if ($sector) {
                //ลบข้อมูล
                $sector->delete();
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function SectorExportpdf() //สร้าง PDF เบี้ยเลี้ยง
    {
        try {
            $sectors = Sectors::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.sectors.PDF', compact('sectors'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storebranch(Request $request) //เพิ่มสาขา
    {
        try {
            $branch = new Branchs;
            $branch->branch = $request->branch; //เก็บวันที่มาสมัครใส่ในdatabase
            $branch->customer_id = $request->customer; //เก็บวันที่มาสมัครใส่ในdatabase
            $branch->sector_id = $request->sector; //เก็บวันที่มาสมัครใส่ในdatabase
            $branch->save(); //save
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function SelectforBranch($id) //เลือกสาขา
    {
        try {
            $branchs = Branchs::where('sector_id', $id)->with('customers', 'sectors')->get();
            return response()->json($branchs);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function BranchDelete($id) //ลบสาขา
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function BranchExportpdf() //สร้าง PDF สาขา
    {
        try {
            $branchs = Branchs::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.branchs.PDF', compact('branchs'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storeroad(Request $request) //เพิ่มเส้นทาง
    {
        try {
            $road = new Roads;
            $road->road = $request->road; //เก็บวันที่มาสมัครใส่ในdatabase
            $road->time = $request->time; //เก็บวันที่มาสมัครใส่ในdatabase
            $road->lat = $request->lat; //เก็บวันที่มาสมัครใส่ในdatabase
            $road->lng = $request->lng; //เก็บวันที่มาสมัครใส่ในdatabase
            $road->status = 1; //เก็บวันที่มาสมัครใส่ในdatabase
            $road->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $road, // ส่งข้อมูล road ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Editroad(Request $request) //แก้ไขเส้นทาง
    {
        try {
            $road = Roads::findOrfail($request->id);
            $road->road = $request->road; //เก็บdatabase
            $road->time = $request->time; //เก็บdatabase
            $road->lat = $request->lat; //เก็บdatabase
            $road->lng = $request->lng; //เก็บdatabase
            $road->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $road, // ส่งข้อมูล Cartype ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function RoadDelete($id) //ลบเส้นทาง
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function RoadExportpdf() //สร้าง PDF สินค้า
    {
        try {
            $roads = Roads::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.roads.PDF', compact('roads'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function RoadUpdateStatus(Request $request) //เปลี่ยนสถานะข้อมูลรถ
    {
        try {
            $road = Roads::find($request->id);
            if ($road) {
                $road->status = $request->status;
                $road->save();

                return response()->json(['success' => true, 'message' => 'อัปเดตสถานะสำเร็จ']);
            }

            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล']);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storecartype(Request $request) //เพิ่มข้อมูลชนิดรถ
    {
        try {
            $cartype = new Cartypes;
            $cartype->name = $request->cartype; //เก็บวันที่มาสมัครใส่ในdatabase
            $cartype->save(); //save
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $cartype, // ส่งข้อมูล Cartype ใหม่กลับ
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CartypeDelete($id) //ลบข้อมูลชนิดรถ
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CartypeExportpdf() //สร้าง PDF ชนิดรถ
    {
        try {
            $cartypes = Cartypes::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.cartypes.PDF', compact('cartypes'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Storecar(Request $request) //เพิ่มรถ
    {
        try {
            $car = new Cars;
            $car->license = $request->license; //เก็บวันที่มาสมัครใส่ในdatabase
            $car->number = $request->number; //เก็บวันที่มาสมัครใส่ในdatabase
            $car->cartype_id = $request->size; //เก็บวันที่มาสมัครใส่ในdatabase
            $car->weight = $request->weight; //เก็บวันที่มาสมัครใส่ในdatabase
            $car->status = 1;
            $car->save(); //save
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function Editcar(Request $request) //แก้ไขรถ
    {
        try {
            $car = Cars::findOrfail($request->id);
            $car->license = $request->license; //เก็บสินค้าในdatabase
            $car->number = $request->number; //เก็บน้ำหนักdatabase
            $car->cartype_id = $request->size; //เก็บน้ำหนักdatabase
            $car->weight = $request->weight; //เก็บน้ำหนักdatabase
            $car->save(); //save
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CarDelete($id) //ลบข้อมูลรถ
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CarExportpdf() //สร้าง PDF ของรถ
    {
        try {
            $cars = Cars::all(); // ดึงข้อมูลทั้งหมด
            $html = view('planner.employees.cars.PDF', compact('cars'))->render(); // โหลด Blade View

            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML($html);
            return $mpdf->Output('product-list.pdf', 'I'); // ดาวน์โหลดไฟล์
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
    public function CarUpdateStatus(Request $request) //เปลี่ยนสถานะข้อมูลรถ
    {
        try {
            $car = Cars::find($request->id);
            if ($car) {
                $car->status = $request->status;
                $car->save();

                return response()->json(['success' => true, 'message' => 'อัปเดตสถานะสำเร็จ']);
            }

            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล']);
        } catch (\Exception $e) {
            Log::error('Error fetching data for CarPlanner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }
}
