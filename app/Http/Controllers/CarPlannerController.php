<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Roads;
use App\Models\Branchs;
use App\Models\Products;
use App\Models\Employees;
use App\Models\Allowances;
use App\Models\Cars;
use App\Models\Carplans;
use App\Models\CarPlanProduct;
use App\Models\Additionalcosts;
use App\Models\Baskets;
use Spatie\Browsershot\Browsershot;

class CarPlannerController extends Controller
{
    public function CarPlanner() //ดึงข้้อมูลไปแสดงหน้าแแกแพน
    {
        $customers = Customers::where('status', 1)->get();
        $roads = Roads::where('status', 1)->get();
        $branchs = Branchs::where('status', 1)->get();
        $products = Products::where('status', 1)->get();
        $drivers = Employees::where('status', 2)->where('position_id', 11)->get();
        $driverassistants = Employees::where('status', 2)->where('position_id', 10)->get();
        $allowances = Allowances::where('status', 1)->get();
        $cars = Cars::where('status', 1)->get();
        $baskets = Baskets::where('status', 1)->get();
        return view('planner/carplanners/carplanner', compact(
            'customers',
            'roads',
            'branchs',
            'products',
            'drivers',
            'driverassistants',
            'allowances',
            'cars',
            'baskets',
        ));
    }
    public function GetBranchsByCustomer($id) //ดึงข้อมูลสาขาตามลูกค้าที่เลือก
    {
        $branchs = Branchs::where('customer_id', $id)->get();
        return response()->json(['branchs' => $branchs]);
    }
    public function GetProductsByCustomer($id) //ดึงข้อมูลสินค้าตามลูกค้าที่เลือก
    {
        // ดึงข้อมูลสินค้าที่เกี่ยวข้องกับลูกค้าตาม ID
        $products = Products::where('customer_id', $id)->get();
        // ส่งข้อมูลกลับในรูปแบบ JSON
        return response()->json(['products' => $products]);
    }
    public function StoreCarPlanner(Request $request) //บันทึกการจัดแพนรถ
    {
        $carplan = new Carplans();
        $carplan->date = $request->date;
        $carplan->customer_id = $request->customer_id;
        $carplan->road_id = $request->road_id;
        $carplan->temperature = $request->temperature;
        $carplan->routetype = $request->roadback;
        $carplan->driver1_id = $request->driver1_id;
        $carplan->allowance1_id = $request->allowance1_id;
        $carplan->driver2_id = $request->driver2_id;
        $carplan->allowance2_id = $request->allowance2_id;
        $carplan->assistant_driver_id = $request->assistant_driver_id;
        $carplan->assistant_allowance_id = $request->assistant_allowance_id;
        $carplan->tatolweight = $request->tatolweight;
        $carplan->totalbasket = $request->totalbasket;
        $carplan->tatolweightbasket = $request->tatolweightbasket;
        $carplan->car_id = $request->car_id;
        $carplan->save();
        // 🔹 อัปเดตสถานะของรถเป็น "ไม่พร้อมใช้งาน" (0)
        Cars::where('id', $request->car_id)->update(['status' => 0]);
        // 🔹 อัปเดตสถานะของเส้นทาง "ไม่พร้อมใช้งาน" (0)
        Roads::where('id', $request->road_id)->update(['status' => 0]);


        $products = $request->input('products', []);
        foreach ($products as $product) {
            $carPlanProduct = new CarPlanProduct();
            $carPlanProduct->carplan_id = $carplan->id;
            $carPlanProduct->branch_id = $product['branch_id'];
            $carPlanProduct->product_id = $product['product_id'];
            $carPlanProduct->weightproduct = $product['weightproduct'];
            $carPlanProduct->save();
        }
        $additionalcosts = $request->input('additionalcosts', []);
        foreach ($additionalcosts as $additionalcost) {
            $AdditionalCost = new Additionalcosts();
            $AdditionalCost->carplan_id = $carplan->id;
            $AdditionalCost->list = $additionalcost['list'];
            $AdditionalCost->price = $additionalcost['price'];
            $AdditionalCost->save();
        }


        return redirect()->back()->with('message', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function CarPlannerReport(Request $request) //แสดงหน้ารายงานผล
    {
        $carplans = Carplans::where('status', 1)->get();
        return view('planner/carplanners/report', compact('carplans'));
    }
    public function EditPlanner($id) //ดึงข้้อมูลไปแสดงหน้าแก้ไขแพน
    {
        $carplan = Carplans::where('id', $id)->first(); //ดึงข่้อมูลแพนรถตามไอดีที่ส่งมา
        $baskets = Baskets::where('status', 1)->get(); //ดึงข่้อมูลตะกร้า
        $carproduct = Carplans::findOrFail($id); //ดึงข้อมูลแพนและความสัมพัน ฟังชั่น CarPlanProducts ที่เขียนตาม ไอดีที่ส่งมา
        $caradditionalcost = Carplans::with('Additionalcosts')->findOrFail($id); //ดึงข้อมูลแพนและความสัมพัน ฟังชั่น Additionalcosts ที่เขียนตาม ไอดีที่ส่งมา
        $customers = Customers::where('status', 1)->get(); //ดึงข้อมูลจากโมเดลCustomers
        $roads = Roads::where('status', 1)->get(); //ดึงข้อมูลจากโมเดลRoads
        $drivers = Employees::where('status', 2)->where('position_id', 11)->get(); //ดึงข้อมูลจากโมเดลEmployees
        $driverassistants = Employees::where('status', 2)->where('position_id', 10)->get(); //ดึงข้อมูลจากโมเดลEmployees
        $allowances = Allowances::where('status', 1)->get(); //ดึงข้อมูลจากโมเดลAllowances
        $cars = Cars::where('status', 1)->get(); //ดึงข้อมูลจากโมเดลCars
        $branchs = Branchs::where('status', 1)->get(); //ดึงข้อมูลจากโมเดลbranchs
        $products = Products::where('status', 1)->get(); //ดึงข้อมูลจากโมเดลProducts
        return view('planner/carplanners/edit', compact(
            'carplan',
            'customers',
            'roads',
            'drivers',
            'allowances',
            'driverassistants',
            'cars',
            'branchs',
            'products',
            'baskets',
            'carproduct',
            'caradditionalcost'
        ));
    }
    public function UpdateCarPlanner(Request $request) //แก้ไขแพน
    {

        $carplan = Carplans::findOrFail($request->id);
        // อัปเดตสถานะรถคันเก่าเป็น 1 (ว่าง)
        if ($carplan->car_id !== $request->car_id) {
            Cars::where('id', $carplan->car_id)->update(['status' => 1]);
        }
        // อัปเดตสถานะรถคันเก่าเป็น 1 (ว่าง)
        if ($carplan->road_id !== $request->road_id) {
            Roads::where('id', $carplan->road_id)->update(['status' => 1]);
        }


        $carplan->date = $request->date;
        $carplan->customer_id = $request->customer_id;
        $carplan->road_id = $request->road_id;
        $carplan->temperature = $request->temperature;
        $carplan->routetype = $request->roadback;
        $carplan->driver1_id = $request->driver1_id;
        $carplan->allowance1_id = $request->allowance1_id;
        $carplan->driver2_id = $request->driver2_id;
        $carplan->allowance2_id = $request->allowance2_id;
        $carplan->assistant_driver_id = $request->assistant_driver_id;
        $carplan->assistant_allowance_id = $request->assistant_allowance_id;
        $carplan->tatolweight = $request->tatolweight;
        $carplan->totalbasket = $request->tatolbasket;
        $carplan->tatolweightbasket = $request->tatolweightbasket;
        $carplan->car_id = $request->car_id;
        $carplan->save();
        // 🔹 อัปเดตสถานะของรถเป็น "ไม่พร้อมใช้งาน" (0)
        Cars::where('id', $request->car_id)->update(['status' => 0]);
        // 🔹 อัปเดตสถานะของเส้นทาง "ไม่พร้อมใช้งาน" (0)
        Roads::where('id', $request->road_id)->update(['status' => 0]);

        // ลบข้อมูลเก่าที่เกี่ยวข้องกับ carplan_id นี้ออก
        CarPlanProduct::where('carplan_id', $carplan->id)->delete();

        // เพิ่มข้อมูลใหม่ลงใน CarPlanProduct
        $products = $request->input('products', []);
        foreach ($products as $product) {
            $carPlanProduct = new CarPlanProduct();
            $carPlanProduct->carplan_id = $carplan->id;
            $carPlanProduct->branch_id = $product['branch_id'];
            $carPlanProduct->product_id = $product['product_id'];
            $carPlanProduct->weightproduct = $product['weightproduct'];
            $carPlanProduct->save();
        }

        // ลบข้อมูลเก่าที่เกี่ยวข้องกับ carplan_id นี้ออก
        Additionalcosts::where('carplan_id', $carplan->id)->delete();

        // เพิ่มข้อมูลใหม่ลงใน CarPlanAdditionalCost
        $additionalcosts = $request->input('additionalcosts', []);
        foreach ($additionalcosts as $additionalcost) {
            $additionalCost = new Additionalcosts();
            $additionalCost->carplan_id = $carplan->id;
            $additionalCost->list = $additionalcost['list'];
            $additionalCost->price = $additionalcost['price'];
            $additionalCost->save();
        }
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function DeletePlanner($id) //ลบแพน
    {
        $carplan = Carplans::findOrfail($id)->delete();
        $additionalcost = Additionalcosts::where('carplan_id', $id)->delete();
        $carplanproduct = CarPlanProduct::where('carplan_id', $id)->delete();
        return back()->with('message', 'ลบข้อมูลเสร็จสมบรูณ์');
    }
    // public function PrintPlanner($id)
    // {
    //     $carplan = Carplans::find($id);
    //     $caradditionalcost = Carplans::with('Additionalcosts')->findOrFail($id);
    //     $carproduct = Carplans::with('CarPlanProducts')->findOrFail($id);
    //     $allowance1 = $carplan->allowance1 ? $carplan->allowance1->name : 0;
    //     $allowance2 = $carplan->allowance2 ? $carplan->allowance2->name : 0;
    //     $allowance3 = $carplan->assistantsallowance2 ? $carplan->assistantsallowance2->name : 0;
    //     $totalallowance = $allowance1 + $allowance2 + $allowance3;

    //     $year = date('Y');
    //     $thaiyear = $year + 543;

    //     $mpdf = new Mpdf([
    //         'format' => [150, 200], // กำหนดขนาดกระดาษ
    //         'margin_left' => 6,
    //         'margin_right' => 6,
    //         'margin_top' => 8,
    //         'margin_bottom' => 20,
    //     ]);
    //     $mpdf->autoScriptToLang = true;
    //     $mpdf->autoLangToFont = true;

    //     $pdfView = View::make('planner/carplanners/print', compact(
    //         'carplan',
    //         'thaiyear',
    //         'totalallowance',
    //         'caradditionalcost',
    //         'carproduct',
    //     ));

    //     $mpdf->WriteHTML($pdfView);
    //     $mpdf->Output();
    // }
    public function PrintPlanner($id)
    {
        $carplan = Carplans::find($id);
        $caradditionalcost = Carplans::with('Additionalcosts')->findOrFail($id);
        $carproduct = Carplans::with('CarPlanProducts')->findOrFail($id);
        $allowance1 = $carplan->allowance1 ? $carplan->allowance1->name : 0;
        $allowance2 = $carplan->allowance2 ? $carplan->allowance2->name : 0;
        $allowance3 = $carplan->assistantsallowance2 ? $carplan->assistantsallowance2->name : 0;
        $totalallowance = $allowance1 + $allowance2 + $allowance3;

        $year = date('Y');
        $thaiyear = $year + 543;

        return view('planner.carplanners.reports.readplan', compact(
            'carplan',
            'thaiyear',
            'totalallowance',
            'caradditionalcost',
            'carproduct',
        ));
    }
    public function PrintPlannerPdf($id)
    {
        $carplan = Carplans::find($id);
        $caradditionalcost = Carplans::with('Additionalcosts')->findOrFail($id);
        $carproduct = Carplans::with('CarPlanProducts')->findOrFail($id);
        $allowance1 = $carplan->allowance1 ? $carplan->allowance1->name : 0;
        $allowance2 = $carplan->allowance2 ? $carplan->allowance2->name : 0;
        $allowance3 = $carplan->assistantsallowance2 ? $carplan->assistantsallowance2->name : 0;
        $totalallowance = $allowance1 + $allowance2 + $allowance3;

        $year = date('Y');
        $thaiyear = $year + 543;

        $template = view('planner.carplanners.reports.reportpdf', compact(
            'carplan',
            'thaiyear',
            'totalallowance',
            'caradditionalcost',
            'carproduct',
        ))->render();
        $pdf = Browsershot::html($template)
            ->showBackground()
            ->format('A4')
            ->margins(4, 4, 4, 4)
            ->pdf();
        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="report.pdf"');
    }
}
