<?php

declare(strict_types=1);

use Geodit\VmOsjs\VmManager;

if (! function_exists('vm_osjs')) {
    function vm_osjs(): VmManager
    {
        return app(VmManager::class);
    }
}
