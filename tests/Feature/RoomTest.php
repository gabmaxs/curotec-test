<?php

namespace Tests\Feature;

use App\Models\Room;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_room(): void
    {
        $body = [
            "participant_name" => "user123"
        ];
        $response = $this->postJson('/api/rooms', $body);

        $response->assertStatus(201);

        $parsedResponse = json_decode($response->getContent(), associative: true);
        $room = Room::find($parsedResponse['room']['id']);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('room.id', $room->id)
                ->where('room.status', 1)
                ->where('participant.room_id', $room->id)
                ->where('participant.host', true)
                ->where('participant.name', $body['participant_name'])
        );
    }
}
