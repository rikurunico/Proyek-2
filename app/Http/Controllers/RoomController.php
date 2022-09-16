<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roomData = Room::all();
        return view('room.index', [
            'title' => 'Room',
            'roomData' => $roomData,
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
        $roomData = Room::all();
        return view('room.create', [
            'title' => 'Create Room',
            'roomData' => $roomData,
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
            'room_number' => 'required|unique:rooms',
            'preview_image' => 'required',
        ]);

        Room::create($request->all());

        return redirect()->route('room.index')->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        $roomData = Room::find($room->id);
        return view('room.show', [
            'title' => 'Show Room',
            'roomData' => $roomData,
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
        //
        $roomData = Room::find($room->id);
        return view('room.edit', [
            'title' => 'Edit Room',
            'roomData' => $roomData,
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
        //
        $this->validate($request, [
            'room_number' => 'required|string|unique:rooms'.$room->id,
            'preview_image' => 'required',
        ]);

        Rooms::find($room->id)->update($request->all());

        return redirect()->route('room.index')->with('success', 'Room updated successfully');
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
        $roomData = Room::find($room->id)->delete();
        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }
}
