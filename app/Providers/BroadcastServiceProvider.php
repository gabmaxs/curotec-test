<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Registra as rotas de broadcast sem middleware
        Broadcast::routes(['middleware' => []]);

        // Inclui as definições de canais
        require base_path('routes/channels.php');
    }
}
