<?php


namespace App\Services\SlackNotification;

use Illuminate\Support\Facades\Facade;

class SlackFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slack';
    }
}
