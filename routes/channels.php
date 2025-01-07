<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::routes(['middleware' => []]);

Broadcast::channel('room.{id}', function () {
    Log::info('aqui');
    return true;
});
