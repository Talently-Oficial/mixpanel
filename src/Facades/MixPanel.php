<?php

namespace MixPanel\Facades;

use Illuminate\Support\Facades\Facade;
use MixPanel\MixPanelWebAnalyticsManager;

class MixPanel extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return MixPanelWebAnalyticsManager::class;
    }

}