<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\PaymentLog;
use Illuminate\Http\Request;

class PaymentLogController extends Controller
{
    public const TRANSACTION_ROUTE = [
        "index" => "transactions.index",
        "store" => "transactions.store",
        "create" => "transactions.create",
        "show" => "transactions.show",
        "edit" => "transactions.edit",
        "update" => "transactions.update",
        "delete" => "transactions.destroy",
        "trashIndex" => "transactions.trash.index",
        "trashDetail" => "transactions.trash.detail",
        "trashRestore" => "transactions.trash.restore",
        "trashDelete" => "transactions.trash.delete"
    ];

    public const TRANSACTION_VIEW = [
        "index" => "dashboard.transaction.index",
        "create" => "dashboard.transaction.create",
        "detail" => "dashboard.transaction.detail",
        "edit" => "dashboard.transaction.edit",
        "trashIndex" => "dashboard.transaction.trashIndex",
        "trashDetail" => "dashboard.transaction.trashDetail",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = PaymentLog::with('dormitory')->paginate(10);
        $months = config("app.month.language.indonesian");
        foreach ($transactions as $transaction) {
            $transaction["bulan_mulai"] = $months[$transaction["bulan_mulai"]-1]["name"];
            $transaction["bulan_selesai"] = $months[$transaction["bulan_selesai"]-1]["name"];
        }
        return view(PaymentLogController::TRANSACTION_VIEW["index"], [
            'title' => 'Data Transaksi',
            'transactions_route' => PaymentLogController::TRANSACTION_ROUTE,
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dormitories = Dormitory::with(["rooms"])->get();
        foreach ($dormitories as $indexdormitory => $dormitory) {
            if (count($dormitory->rooms) == 0) {
                unset($dormitories[$indexdormitory]);
            }
        }
        return view(PaymentLogController::TRANSACTION_VIEW["create"], [
            'title' => 'Tambah Transaksi',
            'transactions_route' => PaymentLogController::TRANSACTION_ROUTE,
            'dormitories_route' => DormitoryController::DORMITORY_ROUTE,
            'dormitories' => $dormitories,
            'transactions' => PaymentLog::all(),
            'month_length' => config("app.month.length"),
            'months' => config("app.month.language.indonesian"),
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
        $this->validate($request, [
            'fk_id_dormitory' => 'required',
            'month_start'   => 'required',
            'month_end'   => 'required',
            'proof_payment' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $proof_payment = $request->file('proof_payment')->store('proof_payment', 'public');


        PaymentLog::create([
            'dormitory_id' => $request->fk_id_dormitory,
            'bulan_mulai' => $request->month_start,
            'bulan_selesai' => $request->month_end,
            'total_bulan' => $request->month_end - $request->month_start,
            'bukti_pembayaran' => $proof_payment,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Payment Log created successfully');
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

        return redirect()->route('transactions.index')->with('success', 'Payment Log updated successfully');
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
        return redirect()->route('transactions.index')->with('success', 'Payment Log deleted successfully');
    }
}
