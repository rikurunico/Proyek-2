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
        return view('dormitory.create', [
            'title' => 'Create Dormitory',
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Dormitory::create($request->all());
        return redirect()->route('dormitory.index')->with('success', 'Dormitory created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function show(Dormitory $dormitory)
    {
        $dormitoryData = Dormitory::all();
        return view('dormitory.index', [
            'title' => 'Dormitory',
            'dormitory' => $dormitoryData,
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
        //
        $dormitoryData = Dormitory::find($dormitory->id);
        return view('dormitory.edit', [
            'title' => 'Edit Dormitory',
            'dormitory' => $dormitoryData,
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
        //
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Dormitory::find($dormitory->id)->update($request->all());
        return redirect()->route('dormitory.index')->with('success', 'Dormitory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dormitory $dormitory)
    {
        //
        Dormitory::find($dormitory->id)->delete();
        return redirect()->route('dormitory.index')->with('success', 'Dormitory deleted successfully');
    }
}
