<?php

namespace App\Http\Controllers;

use App\Models\ParentDormitory;
use Illuminate\Http\Request;

class ParentDormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parentDormitoryData = ParentDormitory::all();
        return view('parentDormitory.index', [
            'title' => 'Parent Dormitory',
            'parentDormitoryData' => $parentDormitoryData,
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
        $parentDormitoryData = ParentDormitory::all();
        return view('parentDormitory.create', [
            'title' => 'Create Parent Dormitory',
            'parentDormitoryData' => $parentDormitoryData,
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
            'name' => 'required|unique:dormitories',
            'phone_number' => 'required',
        ]);

        ParentDormitory::create($request->all());

        return redirect()->route('parentDormitory.index')->with('success', 'Parent Dormitory created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentDormitory  $parentDormitory
     * @return \Illuminate\Http\Response
     */
    public function show(ParentDormitory $parentDormitory)
    {
        //
        $parentDormitoryData = ParentDormitory::find($parentDormitory->id);
        return view('parentDormitory.show', [
            'title' => 'Show Parent Dormitory',
            'parentDormitoryData' => $parentDormitoryData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParentDormitory  $parentDormitory
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentDormitory $parentDormitory)
    {
        //
        $parentDormitoryData = ParentDormitory::find($parentDormitory->id);
        return view('parentDormitory.edit', [
            'title' => 'Edit Parent Dormitory',
            'parentDormitoryData' => $parentDormitoryData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParentDormitory  $parentDormitory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentDormitory $parentDormitory)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|numeric|unique:dormitories,phone_number,' . $parentDormitory->id,
        ]);

        ParentDormitory::find($parentDormitory->id)->update($request->all());

        return redirect()->route('parentDormitory.index')->with('success', 'Parent Dormitory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentDormitory  $parentDormitory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentDormitory $parentDormitory)
    {
        //
        ParentDormitory::find($parentDormitory->id)->delete();

        return redirect()->route('parentDormitory.index')->with('success', 'Parent Dormitory deleted successfully');
    }
}
