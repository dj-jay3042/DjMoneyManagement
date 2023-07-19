<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\WrkDays;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalaryController extends Controller
{
    public function index() {
        $leaves = Leave::selectRaw('(DATEDIFF(lEndDate, lStartDate) + 1)')
        ->select('lReason','lStartDate', 'lEndDate', 'lType')
        ->orderBy('id', 'DESC')
        ->get();
        $work = WrkDays::select('id as month', 'workingDays', 'workedDays')->selectRaw('(workingDays - workedDays) as tl')->get();
        $lcount = 0;
        $scount = 0;
        return view('salary', compact('lcount', 'scount', 'leaves', 'work'));
    }

    public function addLeave(Request $request) {
        $lReason = $request->input("lReason");
        $lsDate = $request->input("lsDate");
        $leDate = $request->input("leDate");
        $lType = $request->input("lType");
        $leave = 0.5;
        if ($lType == 0) {
            $startDate = Carbon::parse($lsDate);
            $endDate = Carbon::parse($leDate);
            $leave = $startDate->diffInDays($endDate) + 1;
        }

        DB::table('TblMonthOf2023')
        ->where('id', Carbon::now()->month)
        ->decrement('workedDays', $leave);

        DB::table('TblLeave')->insert([
            'lReason' => $lReason,
            'lStartDate' => $lsDate,
            'lEndDate' => $leDate,
            'lType' => $lType
        ]);
        return redirect()->route('salary');
    }
}
