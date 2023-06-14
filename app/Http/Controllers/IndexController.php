<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
        public function customReport(Request $request)
    {
        $from = $request->input("dateFrom");
        $to = $request->input("dateTo");
        if ($from == null)
            $from = Carbon::now()->startOfMonth()->toDateString();
        if ($to == null)
            $to = Carbon::now()->endOfMonth()->toDateString();

        $result  = DB::select("
        SELECT 
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 1 AND traMethod = '0') AS cashCredit,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 0 AND traMethod = '0') AS cashDebit,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 1 AND traMethod = '0') - (SELECT sum(traAmount) FROM TblTransection WHERE traType = 0 AND traMethod = '0') AS cashBalance,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 1 AND traMethod = '1') AS pwCredit,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 0 AND traMethod = '1') AS pwDebit,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 1 AND traMethod = '1') - (SELECT sum(traAmount) FROM TblTransection WHERE traType = 0 AND traMethod = '1') AS pwBalance,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 1 AND (traMethod = '2' OR traMethod = '3' OR traMethod = '4' OR traMethod = '5')) AS ppbCredit,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 0 AND (traMethod = '2' OR traMethod = '3' OR traMethod = '4' OR traMethod = '5')) AS ppbDebit,
            (SELECT sum(traAmount) FROM TblTransection WHERE traType = 1 AND (traMethod = '2' OR traMethod = '3' OR traMethod = '4' OR traMethod = '5')) - (SELECT sum(traAmount) FROM TblTransection WHERE traType = 0 AND (traMethod = '2' OR traMethod = '3' OR traMethod = '4' OR traMethod = '5')) AS ppbBalance
        FROM
            TblTransection
        LIMIT 1;");
        $accountReport = [
            "cashCredit" => $result[0]->cashCredit,
            "cashDebit" => $result[0]->cashDebit,
            "cashBalance" => $result[0]->cashBalance,
            "pwCredit" => $result[0]->pwCredit,
            "pwDebit" => $result[0]->pwDebit,
            "pwBalance" => $result[0]->pwBalance,
            "ppbCredit" => $result[0]->ppbCredit,
            "ppbDebit" => $result[0]->ppbDebit,
            "ppbBalance" => $result[0]->ppbBalance,
        ];

        
        $data = Data::orderBy('traDate', 'desc')->orderBy('traType', 'asc')->get();
        $count = 0;
        $sum = DB::table('TblTransection')->select(DB::raw('SUM(traAmount) as total_amount'))->where('traType', 1)->get();
        $totalAmount = $sum[0]->total_amount;
        $sum = DB::table('TblTransection')->select(DB::raw('SUM(traAmount) as spent'))->where('traType', 0)->get();
        $spent = $sum[0]->spent;
        $balance = $totalAmount - $spent;
        $report = ["totalAmount" => $totalAmount, "spent" => $spent, "balance" => $balance];
        $balReport = ["cash" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '0' AND traType = 0 LIMIT 1")[0]->report, 
            "paytm" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '1' AND traType = 0 LIMIT 1")[0]->report,
            "gpay" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '2' AND traType = 0 LIMIT 1")[0]->report,
            "phonepay" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '3' AND traType = 0 LIMIT 1")[0]->report,
            "amazonpay" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '4' AND traType = 0 LIMIT 1")[0]->report,
            "card" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '5' AND traType = 0 LIMIT 1")[0]->report,
            "cheque" => DB::select("SELECT SUM(traAmount) as report FROM TblTransection WHERE traMethod = '6' AND traType = 0 LIMIT 1")[0]->report];

        return view('index', compact('data', 'count', 'report', 'balReport', 'accountReport'));
    }
}
