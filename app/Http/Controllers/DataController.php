<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function view() {
        return view('data');
    }

    public function addTransection(Request $request) {
        $traTitle = $request->input("traTitle");
        $traEntity = $request->input("traEntity");
        $traAmount = $request->input("traAmount");
        $traType = $request->input("traType");
        $traMethod = $request->input("traMethod");
        DB::table('TblTransection')->insert([
            'traTitle' => $traTitle,
            'traEntity' => $traEntity,
            'traAmount' => $traAmount,
            'traType' => $traType,
            'traMethod' => $traMethod
        ]);
        return redirect()->route('index');
    }
}
