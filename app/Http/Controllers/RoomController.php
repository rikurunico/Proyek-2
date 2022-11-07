<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        "trashIndex" => "rooms.trash.index",
        "trashDetail" => "rooms.trash.detail",
        "trashRestore" => "rooms.trash.restore",
        "trashDelete" => "rooms.trash.delete"
    ];

    public const ROOM_VIEW = [
        "index" => "dashboard.room.index",
        "create" => "dashboard.room.create",
        "detail" => "dashboard.room.detail",
        "edit" => "dashboard.room.edit",
        "trashIndex" => "dashboard.room.trashIndex",
        "trashDetail" => "dashboard.room.trashDetail",
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
            'rooms' => Room::with(["dormitory"])->orderByRaw("CAST(room_number AS UNSIGNED) ASC")->paginate(10),
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
            'dormitories_route' => DormitoryController::DORMITORY_ROUTE,
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
            'room_number' => 'required|integer|min:0',
            'fk_id_dormitory' => 'required|unique:rooms'
        ];

        $validator = Validator::make($request->all(), $rulesData);

        $validatedData = $validator->validated();

        $unique_room_number = Room::with(["dormitory"])->where("room_number", $request->room_number)->first();
        if ($unique_room_number) {
            $validator->errors()->add(
                'room_number',
                "The room_number has already been taken."
            );
            return redirect(route(RoomController::ROOM_ROUTE["create"]))->withErrors($validator)->withInput();
        } else {
            $unique_room_number = Room::withTrashed()->where("room_number", $request->room_number)->first();
            if ($unique_room_number) {
                $validator->errors()->add(
                    'room_number',
                    "The room_number has in trash. To use this room_number please restore the data. Click <a href='" . route(RoomController::ROOM_ROUTE["trashDetail"], $unique_room_number->id) . "'>here to restore</a>"
                );
                return redirect(route(RoomController::ROOM_ROUTE["create"]))->withErrors($validator)->withInput();
            }
        }

        $room = Room::create($validatedData);

        $rulesDataImage = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        for ($i = 0; $i < count($request->file('image')); $i++) {
            $validatedDataImage = $request->validate($rulesDataImage);
            $file = $request->file('image')[$i]->store('rooms-images', 'public');

            $validatedDataImage["image"] = $file;
            $validatedDataImage["fk_id_room"] = $room->id;

            RoomImage::create($validatedDataImage);
        }

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
            'rooms_route' => RoomController::ROOM_ROUTE,
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


    public function trashIndex()
    {
        return view(RoomController::ROOM_VIEW["trashIndex"], [
            'title' => 'Data Sampah Kamar',
            'rooms' => Room::onlyTrashed()->orderByRaw("CAST(room_number AS UNSIGNED) ASC")->paginate(10),
            'rooms_route' => RoomController::ROOM_ROUTE
        ]);
    }

    public function trashShow($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        if ($room->trashed()) {
            return view(RoomController::ROOM_VIEW["trashDetail"], [
                'title' => "Detail Kamar $room->room_number",
                'room' => $room,
                'rooms_route' => RoomController::ROOM_ROUTE
            ]);
        } else {
            return abort(404);
        }
    }

    public function trashRestore($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        if ($room->trashed()) {
            $room->restore();
            return redirect()->route(RoomController::ROOM_ROUTE["trashIndex"])->with('success', 'Data berhasil di restore. Lihat data <a href="' . route(RoomController::ROOM_ROUTE["index"]) . '">disini</a>');
        } else {
            return redirect()->route(RoomController::ROOM_ROUTE["trashIndex"])->with('success', 'Data tidak ada di sampah');
        }
    }

    public function trashDelete($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        if ($room->trashed()) {
            $room->forceDelete();
            return redirect()->route(RoomController::ROOM_ROUTE["trashIndex"])->with('success', 'Data berhasil di hapus secara permanent');
        } else {
            return redirect()->route(RoomController::ROOM_ROUTE["trashIndex"])->with('success', 'Data tidak ada di sampah');
        }
    }
}
