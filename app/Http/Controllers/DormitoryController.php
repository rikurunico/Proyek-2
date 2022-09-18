<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use Illuminate\Http\Request;

class DormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public const DORMITORY_ROUTE = [
        "index" => "dormitory.index",
        "store" => "dormitory.store",
        "create" => "dormitory.create",
        "show" => "dormitory.show",
        "edit" => "dormitory.edit",
        "update" => "dormitory.update",
        "delete" => "dormitory.destroy",
    ];

    public const DORMITORY_VIEW = [
        "index" => "dashboard.dormitory.index",
        "create" => "dashboard.dormitory.create",
        "detail" => "dashboard.dormitory.detail",
        "edit" => "dashboard.dormitory.edit",
    ];
    
    public function index()
    {
        return view(DormitoryController::DORMITORY_VIEW["index"], [
            'title' => 'Data Penghuni',
            'dormitories' => Dormitory::orderBy("name")->paginate(10),
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
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
        return view(DormitoryController::DORMITORY_VIEW["create"], [
            'title' => 'Tambah Penghuni',
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
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
        
        $rulesData = [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|unique:dormitories',
        ];
        
        $validatedData = $request->validate($rulesData);
        
        Dormitory::create($validatedData);
        
        return redirect()->route(DormitoryController::DORMITORY_ROUTE["index"])->with('success', 'Data Penghuni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function show(Dormitory $dormitory)
    {
        return view(DormitoryController::DORMITORY_VIEW["detail"], [
            'title' => "Detail Penghuni $dormitory->name",
            'dormitory' => $dormitory,
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function edit(Dormitory $dormitory)
    {
        return view(DormitoryController::DORMITORY_VIEW["edit"], [
            'title' => 'Edit Data Penghuni',
            'dormitory' => $dormitory,
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dormitory $dormitory)
    {
        $rulesData = [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|unique:dormitories,phone_number,'.$dormitory->id ,
        ];

        $validatedData = $request->validate($rulesData);

        Dormitory::where("id", $dormitory->id)->update($validatedData);
        return redirect()->route(DormitoryController::DORMITORY_ROUTE["index"])->with('success', 'Data penghuni berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dormitory $dormitory)
    {
        Dormitory::find($dormitory->id)->delete();
        return redirect()->route(DormitoryController::DORMITORY_ROUTE["index"])->with('success', 'Data Penghuni berhasil dihapus');
    }
}
