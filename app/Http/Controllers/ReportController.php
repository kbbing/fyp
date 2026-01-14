<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Report;
use Auth;
use Session;

class ReportController extends Controller
{
    public function index(){
        $report = Report::orderBy('created_at', 'desc')->get();
        return view('admin.report')->with('report', $report);
    }
}
