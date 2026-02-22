<?php

declare(strict_types=1);

namespace Geodit\VmOsjs;

class VmManager
{
    public function entry(): \Illuminate\Http\RedirectResponse|\Illuminate\View\View
    {
        $controller = app(\Geodit\VmOsjs\Http\Controllers\VmPortalController::class);

        return app()->call([$controller, '__invoke'], [
            'request' => request(),
        ]);
    }
}
