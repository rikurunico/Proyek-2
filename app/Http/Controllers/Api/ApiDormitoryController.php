<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Dormitory;
use Exception;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class ApiDormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dormitories = Dormitory::all();
        if ($dormitories) {
            return ApiFormatter::createApi(200, "Success", $dormitories);
        } else {
            return ApiFormatter::createApi(404, "Not Found", null);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:dormitories',
                'address' => 'required',
                'phone_number' => 'required|unique:dormitories|numeric|digits_between:11,13',
            ]);

            $data = Dormitory::create($request->all());

            $data = Dormitory::where('id', "=", $data->id)->first();

            if ($data) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Failed", null);
            }
        } catch (Exception $e) {
            return ApiFormatter::createApi(400, "Failed", null);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function show(Dormitory $dormitory)
    {
        $data = Dormitory::where('id', "=", $dormitory->id)->first();
        if ($data) {
            return ApiFormatter::createApi(200, "Success", $data);
        } else {
            return ApiFormatter::createApi(404, "Not Found", null);
        }
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
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                
            ]);

            $data = Dormitory::where('id', "=", $dormitory->id)->first();
            $data->name = $request->name;
            $data->address = $request->address;
            $data->phone_number = $request->phone_number;
            $data->save();

            $data = Dormitory::where('id', "=", $dormitory->id)->first();

            if ($data) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Failed", null);
            }
        } catch (Exception $e) {
            return ApiFormatter::createApi(400, "Failed", null);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dormitory $dormitory)
    {
        try {
            $dormitory->delete();

            if ($dormitory) {
                return ApiFormatter::createApi(200, "Success", $dormitory);
            } else {
                return ApiFormatter::createApi(400, "Failed", null);
            }
        } catch (Exception $e) {
            return ApiFormatter::createApi(400, "Failed", null);
        }
    }
}
