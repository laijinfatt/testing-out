<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Models\myCart;
use App\Models\myOrder;
use Auth;

class PDFController extends Controller
{
    public function pdfReport(){
        $orders=DB::table('my_orders')
        ->select('my_orders.*')
        ->get();

        $pdf = PDF::loadView('myPDF', compact('orders'));

        return $pdf->download('orderReport.pdf');
    }
}
