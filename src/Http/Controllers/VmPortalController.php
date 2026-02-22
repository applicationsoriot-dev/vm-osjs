<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Http\Controllers;

use Geodit\VmOsjs\Support\VmStateResolver;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VmPortalController
{
    public function __invoke(Request $request, VmStateResolver $resolver): View
    {
        $state = $resolver->resolve($request);

        return view('vm-osjs::portal', [
            'embedUrl' => route(config('vm_osjs.route_names.embed', 'vm.osjs.embed'), ['stage' => $state['stage']]),
            'state' => $state,
        ]);
    }
}
