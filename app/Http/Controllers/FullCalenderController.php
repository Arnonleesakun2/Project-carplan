<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedules;
use Carbon\Carbon;
class FullCalenderController extends Controller
{
    public function FullCalender()//แสดงหน้าปฏิทิน
    {
        return view('/admin/calenders/fullcalender');
    }
    public function Create(Request $request)//เพิ่มข้อมูล
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required'],
            [
                'title.required' => 'กรุณาใส่หัวข้อ',
                'description.required' => 'กรุณาใส่รายละเอียด'
            ]
        );
        $item = new Schedules();
        $item->title = $request->title;
        $item->start = $request->start;
        $item->end = $request->end;
        $item->description = $request->description;
        $item->color = $request->color;
        $item->save();

        return redirect('/FullCalender')->with('message','เพิ่มข้อมูลเสร็จสมบูรณ์');
    }
    public function GetEvents()//แสดงข้อมูล
    {
        $schedules = Schedules::all();
        return response()->json($schedules);
    }
    public function DeleteEvent($id)//ลบข้อมูล
    {
        $schedule = Schedules::findOrFail($id);
        $schedule->delete();
        return response()->json(['message' => 'Event deleted successfully']);
    }
    public function Update(Request $request, $id)//แก้ไขข้อมูล
    {
        $schedule = Schedules::findOrFail($id);

        $schedule->update([
            'start' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            'end' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        return response()->json(['message' => 'Event moved successfully']);
    }
    public function Resize(Request $request, $id)//แก้ไขวันเวลา
    {
        $schedule = Schedules::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('end_date'))->setTimezone('UTC');
        $schedule->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }

}
