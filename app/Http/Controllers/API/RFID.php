<?php

namespace App\Http\Controllers\API;

use App\Events\NotificationRecieved;
use App\Http\Controllers\Controller;
use App\Models\student;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RFID extends Controller
{
    public function sendRfid(Request $request)
    {
        try {
            $id = $request->input('num');
            $student = student::where('rfid', $id)->first();
            event(new NotificationRecieved($student));
            return response()->json(['message' => $student, "status" => "true", "code" => 200]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), "status" => "true", "code" => 304]);
        }
    }
}
