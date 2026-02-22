<?php

declare(strict_types=1);

namespace Geodit\VmOsjs;

class VmManager
{
    public function entry(): \Illuminate\Http\RedirectResponse|\Illuminate\View\View
    {
        return app()->call([\Geodit\VmOsjs\Http\Controllers\VmPortalController::class, '__invoke'], [
            'request' => request(),
        ]);
    }
}
