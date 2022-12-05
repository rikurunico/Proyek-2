<?php

use App\Helpers\ApiFormatter;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DormitoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentLogController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageRoomController;
use App\Models\DataInstance;
use App\Models\Dormitory;
use App\Models\PaymentLog;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = DataInstance::get()->first();
    $data["price_room_month"] = number_format((int)$data["price_room"], 2, ',', '.');
    $data["price_room_year"] = number_format((int)$data["price_room"] * 12, 2, ',', '.');
    return view('home', [
        'total_dormitories' => count(Dormitory::all()),
        'total_rooms' => count(Room::all()),
        'total_transactions' => count(PaymentLog::all()),
        'total_users' => count(User::all()),
        'data' => $data
    ]);
})->name("home");

Route::get('/sketch', function () {
    return view('sketch.index', [
        "room" => Room::with(["dormitory", "roomimages"])->get()
    ]);
})->name("sketch.index");

Route::get('/sketch/room/{room_number}', function ($room_number) {
    return view('sketch.ajax.modalsketch', [
        "data" => DataInstance::first(),
        "room" => Room::with(["dormitory", "roomimages"])->where("room_number", $room_number)->first(),
        "room_number" => $room_number
    ]);
})->name("sketch.ajax.room");

Route::get('/sketch/floor/{floor_number}', function ($floor_number) {
    if (!in_array($floor_number, ["l1", "l2", "l3"])) {   
        return "<h1 class='text-danger'>No Data</h1>";
    }
    return view('sketch.ajax.' . $floor_number);
})->name("sketch.ajax.floor");

Route::get('/login', [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post('/login', [LoginController::class, "store"])->name("login.store");

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, "logout"])->name("logout");
    Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard.index");
    Route::resource('/dashboard/rooms', RoomController::class);
    Route::resource('/dashboard/dormitory', DormitoryController::class);
    Route::resource('/dashboard/transactions', PaymentLogController::class)->except(
        ['edit', 'update']
    );
    Route::resource('/dashboard/users', UserController::class);

    // --Trash Data--
    // Dashboard Data
    Route::get('/dashboard/trash/rooms', [RoomController::class, "trashIndex"])->name("rooms.trash.index");
    Route::get('/dashboard/trash/dormitory', [DormitoryController::class, "trashIndex"])->name("dormitory.trash.index");
    Route::get('/dashboard/trash/transactions', [PaymentLogController::class, "trashIndex"])->name("transactions.trash.index");
    Route::get('/dashboard/trash/users', [UserController::class, "trashIndex"])->name("users.trash.index");
    // Detail Data
    Route::get('/dashboard/trash/rooms/{id}', [RoomController::class, "trashShow"])->name("rooms.trash.detail");
    Route::get('/dashboard/trash/dormitory/{id}', [DormitoryController::class, "trashShow"])->name("dormitory.trash.detail");
    Route::get('/dashboard/trash/transactions/{id}', [PaymentLogController::class, "trashShow"])->name("transactions.trash.detail");
    Route::get('/dashboard/trash/users/{id}', [UserController::class, "trashShow"])->name("users.trash.detail");
    // Restore Data
    Route::get('/dashboard/trash/rooms/{id}/restore', [RoomController::class, "trashRestore"])->name("rooms.trash.restore");
    Route::get('/dashboard/trash/dormitory/{id}/restore', [DormitoryController::class, "trashRestore"])->name("dormitory.trash.restore");
    Route::get('/dashboard/trash/transactions/{id}/restore', [PaymentLogController::class, "trashRestore"])->name("transactions.trash.restore");
    Route::get('/dashboard/trash/users/{id}/restore', [UserController::class, "trashRestore"])->name("users.trash.restore");
    // Delete Permanent Data
    Route::delete('/dashboard/trash/rooms/{id}', [RoomController::class, "trashDelete"])->name("rooms.trash.delete");
    Route::delete('/dashboard/trash/dormitory/{id}', [DormitoryController::class, "trashDelete"])->name("dormitory.trash.delete");
    Route::delete('/dashboard/trash/transactions/{id}', [PaymentLogController::class, "trashDelete"])->name("transactions.trash.delete");
    Route::delete('/dashboard/trash/users/{id}', [UserController::class, "trashDelete"])->name("users.trash.delete");

    // --Rooms Image--
    // Delete Image
    Route::get('/dashboard/rooms/{id}/image', [ImageRoomController::class, "Destroy"])->name("image.rooms.destroy");
    // Add Image
    Route::post('/dashboard/rooms/{id}/image', [ImageRoomController::class, "Store"])->name("image.rooms.store");

    // // --Transactions Month --
    // Route::get('/dashboard/dormitory/payment/{id}', function ($id) {
    //     $data = Dormitory::where("id", $id)->first();
    //     $date_start_checkin = getdate(strtotime($data->checkin_date));

    //     return view("dashboard.dormitory.ajax.paymentlog", [
    //         'year_checkin'=> $date_start_checkin["year"],
    //         'dormitory_id' => $id
    //     ]);
    // })->name("dormitory.ajax.payment");

    Route::get('/dashboard/dormitory/payment/{id}/year/{year}', function ($id, $year) {
        $dataDormitory = Dormitory::where("id", $id)->first();

        $dataPayment = PaymentLog::where("fk_id_dormitory", $id)->get();
        
        $date_start_checkin = getdate(strtotime($dataDormitory->checkin_date));
        
        $months_year_checkin = config("app.month.language.indonesian");
        
        foreach ($months_year_checkin as $monthIndex => $month) {
            if ($month["id"] < $date_start_checkin["mon"]) {
                unset($months_year_checkin[$monthIndex]);
            }
        }

        return view("dashboard.dormitory.ajax.monthpayment", [
            'year_checkin'=> $date_start_checkin["year"],
            'year'=> $year,
            'months_year_checkin' => $months_year_checkin,
            'max_year' => config("app.max_year"),
            'months' => config("app.month.language.indonesian"),
        ]);
    })->name("dormitory.ajax.payment");

    Route::get('/dashboard/dormitory/get/{id}', function ($id) {
        $dataResponse = [];
        $dataDormitory = Dormitory::with(["rooms"])->where("id", $id)->first();
        $dataPayment = PaymentLog::where("fk_id_dormitory", $id)->orderBy('to', 'desc')->first();

        $dataResponse["success"] = false;

        if(!$dataDormitory || !$dataPayment){
            return ApiFormatter::createApi("200", "No Data ", $dataResponse);
        }

        if ($dataDormitory && $dataPayment) {
            if ($dataPayment->count() > 0) {
                $dataResponse["last_month"] = (int)date("m", strtotime($dataPayment->to));
                $dataResponse["last_year"] = date("Y", strtotime($dataPayment->to));
                $dataResponse["success"] = true;
            } else {
                if ($dataDormitory->checkin_date) {
                    $dataResponse["last_month"] = (int)date("m", strtotime($dataDormitory->checkin_date));
                    $dataResponse["last_year"] = date("Y", strtotime($dataDormitory->checkin_date));
                    $dataResponse["success"] = true;
                } else {
                    $dataResponse["success"] = false;
                }
            }
        }

        return ApiFormatter::createApi("200", "success", $dataResponse);
    })->name("dormitory.ajax.getdata");
});
