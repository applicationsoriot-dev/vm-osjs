<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Http\Controllers;

use Geodit\VmOsjs\Contracts\VmLogoutHandlerInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VmLogoutController
{
    public function __invoke(Request $request, VmLogoutHandlerInterface $handler): RedirectResponse
    {
        $handler->logout($request);

        return redirect()->route(config('vm_osjs.route_names.portal', 'vm.osjs.portal'), ['stat' => 'guest']);
    }
}
