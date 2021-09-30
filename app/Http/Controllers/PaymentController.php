<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Excel;

class PaymentController extends Controller
{
  
    public function create()
    {
        return view('payment.create');
    }

 
    public function store(Request $request)
    {    $tid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $payment = new payment;
        $payment->tid = $tid;
        $payment->pid = $request->input('pid');
        $payment->studentid = $request->input('studentid');
        $payment->student_id = $request->input('student_id');
        $payment->amount = $request->input('amount');
        $payment->status = $request->input('status');
        $payment->save();
        return redirect()->back()->with('status','Check On Show Data');
    }

 
    public function show(payment $payment)
    {
        $payment=payment::all();
        return view('payment.show' , compact('payment'));
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'PaymentDetail.xlsx');
    }
  
}

