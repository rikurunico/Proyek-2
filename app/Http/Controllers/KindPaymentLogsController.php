<?php

namespace App\Http\Controllers;

use App\Models\KindPaymentLogs;
use Illuminate\Http\Request;

class KindPaymentLogsController extends Controller
{
    public const KINDPAYMENT_ROUTE = [
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

    public const KINDPAYMENT_VIEW = [
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KindPaymentLogs  $kindPaymentLogs
     * @return \Illuminate\Http\Response
     */
    public function show(KindPaymentLogs $kindPaymentLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KindPaymentLogs  $kindPaymentLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(KindPaymentLogs $kindPaymentLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KindPaymentLogs  $kindPaymentLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KindPaymentLogs $kindPaymentLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KindPaymentLogs  $kindPaymentLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(KindPaymentLogs $kindPaymentLogs)
    {
        //
    }
}
