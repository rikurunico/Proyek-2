<?php

namespace App\Http\Controllers;

use App\Models\PaymentLog;
use Illuminate\Http\Request;

class PaymentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paymentLogData = PaymentLog::all();
        return view('paymentLog.index', [
            'title' => 'Payment Log',
            'paymentLogData' => $paymentLogData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paymentLogData = PaymentLog::all();
        return view('paymentLog.create', [
            'title' => 'Create Payment Log',
            'paymentLogData' => $paymentLogData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'payment_date' => 'required',
            'status' => 'required',
            'payment_month' => 'required',
        ]);

        PaymentLog::create($request->all());

        return redirect()->route('paymentLog.index')->with('success', 'Payment Log created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentLog $paymentLog)
    {
        //
        $paymentLogData = PaymentLog::find($paymentLog->id);
        return view('paymentLog.show', [
            'title' => 'Show Payment Log',
            'paymentLogData' => $paymentLogData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLog $paymentLog)
    {
        //
        $paymentLogData = PaymentLog::find($paymentLog->id);
        return view('paymentLog.edit', [
            'title' => 'Edit Payment Log',
            'paymentLogData' => $paymentLogData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLog $paymentLog)
    {
        //
        $this->validate($request, [
            'payment_date' => 'required',
            'status' => 'required',
            'payment_month' => 'required',
        ]);

        PaymentLog::find($paymentLog->id)->update($request->all());

        return redirect()->route('paymentLog.index')->with('success', 'Payment Log updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLog $paymentLog)
    {
        //
        PaymentLog::find($paymentLog->id)->delete();
        return redirect()->route('paymentLog.index')->with('success', 'Payment Log deleted successfully');
    }
}
