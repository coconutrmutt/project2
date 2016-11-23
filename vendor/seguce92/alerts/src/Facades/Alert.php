<?php
namespace Seguce92\Alerts\Facades;

use Illuminate\Support\Facades\Facade;

class Alert extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seguce92.alerts';
    }
}
