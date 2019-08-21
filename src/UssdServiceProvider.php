<?php

namespace TNM\USSD;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class UssdServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        Response::macro('ussd', function (string $message, int $type) {
            return
                "<ussd>" .
                "<type>$type</type>" .
                "<msg>$message</msg>" .
                "<premium><cost>0</cost><ref>NULL</ref></premium>" .
                "</ussd>";
        });

    }

    public function register()
    {

    }

}