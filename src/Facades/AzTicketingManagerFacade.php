<?php

namespace Kinsari\Azticketing\Facades;

use Illuminate\Support\Facades\Facade;

class AzTicketingManagerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AzTicketingManager';
    }
}
