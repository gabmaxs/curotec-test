<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            "participant_name" => "required|string|max:255",
        ]);

        $room = Room::create(["status"=> 1]);
        $participant = $room->participants()->create([
            "name" => $request->get("participant_name"),
            "host" => true,
        ]);

        return response()->json([
            "room" => $room,
            "participant" => $participant,
        ])->setStatusCode(201);
    }

    public function join(Room $room, Request $request) {
        $request->validate([
            "participant_name" => "required|string|max:255",
        ]);

        $participant = $room->participants()->create([
            "name" => $request->get("participant_name"),
            "host" => false,
        ]);

        return response()->json([
            "room" => $room,
            "participant" => $participant,
        ])->setStatusCode(200);
    }
}
