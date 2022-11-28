<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\PaymentLog;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard", [
            "title" => "Dashboard",
            'total_dormitories' => count(Dormitory::all()),
            'total_rooms' => count(Room::all()),
            'total_transactions' => count(PaymentLog::all()),
            'total_users' => count(User::all())
        ]);
    }
}
