<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'id',
        'name',
        'host',
        'room_id',
    ];

    protected function casts(): array
    {
        return [
            'host' => 'boolean',
        ];
    }
}
