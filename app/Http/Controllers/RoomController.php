<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public const ROOM_ROUTE = [
        "index" => "rooms.index",
        "store" => "rooms.store",
        "create" => "rooms.create",
        "show" => "rooms.show",
        "edit" => "rooms.edit",
        "update" => "rooms.update",
        "delete" => "rooms.destroy",
    ];

    public const ROOM_VIEW = [
        "index" => "dashboard.room.index",
        "create" => "dashboard.room.create",
        "detail" => "dashboard.room.detail",
        "edit" => "dashboard.room.edit",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(RoomController::ROOM_VIEW["index"], [
            'title' => 'Room',
            'rooms' => Room::with(["dormitory"])->orderBy("room_number")->paginate(10),
            'rooms_route' => RoomController::ROOM_ROUTE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dormitories = Dormitory::all();
        //
        return view(RoomController::ROOM_VIEW["create"], [
            'title' => 'Tambah Kamar',
            'rooms_route' => RoomController::ROOM_ROUTE,
            'dormitories' => $dormitories
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
            'room_number' => 'required|integer|min:0|unique:rooms',
            // 'preview_image' => 'required|image|max:2048',
        ];

        $validatedData = $request->validate($rulesData);

        Room::create($validatedData);

        return redirect()->route(RoomController::ROOM_ROUTE["index"])->with('success', 'Data Kamar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view(RoomController::ROOM_VIEW["detail"], [
            'title' => "Detail Kamar $room->name",
            'room' => $room,
            'rooms_route' => RoomController::ROOM_ROUTE
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        // return dd($room);
        return view(RoomController::ROOM_VIEW["edit"], [
            'title' => "Edit Kamar $room->name",
            'room' => $room,
            'dormitories' => Dormitory::all(),
            'rooms_route' => RoomController::ROOM_ROUTE
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        // return dd($request);
        $rulesData = [
            'name' => 'required|unique:rooms,name,' . $room->id,
            'room_number' => 'required|integer|min:0|unique:rooms,room_number,' . $room->id,
            // 'preview_image' => 'required|image|max:2048',
        ];

        $validatedData = $request->validate($rulesData);

        Room::where("id", $room->id)->update($validatedData);

        return redirect()->route(RoomController::ROOM_ROUTE["index"])->with('success', 'Data Kamar berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        Room::find($room->id)->delete();
        return redirect()->route(RoomController::ROOM_ROUTE["index"])->with('success', 'Data Kamar berhasil dihapus');
    }
}
