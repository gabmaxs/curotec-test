<?php

namespace Tests\Feature;

use App\Models\Room;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RoomTest extends TestCase
{
    /**
     * Test the create room useCase
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

    /**
     * Test the join room useCase
     */
    public function test_join_room(): void
    {
        // create room
        // @todo: refactor to use factories
        $responseCreate = $this->postJson('/api/rooms', [
            "participant_name" => "user123"
        ]);
        $responseCreate->assertStatus(201);

        $parsedResponseCreate = json_decode($responseCreate->getContent(), associative: true);
        $room = Room::find($parsedResponseCreate['room']['id']);

        //join room
        $body = [
            "participant_name" => "user456"
        ];

        $response = $this->postJson("/api/rooms/$room->id/join", $body);
        $response->assertStatus(200);

        $parsedResponse = json_decode($response->getContent(), associative: true);
        $room = Room::find($parsedResponse['room']['id']);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('room.id', $room->id)
                ->where('room.status', 1)
                ->where('participant.room_id', $room->id)
                ->where('participant.host', false)
                ->where('participant.name', $body['participant_name'])
        );
    }
}
