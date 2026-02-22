<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Http\Controllers;

use Geodit\VmOsjs\Support\VmStateResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class VmPortalController
{
    public function __invoke(Request $request, VmStateResolver $resolver): View
    {
        $state = $resolver->resolve($request);
        $embedRoute = Route::has('osjs.embed')
            ? 'osjs.embed'
            : (string) config('vm_osjs.route_names.embed', 'vm.osjs.embed');

        $embedQuery = [
            'stat' => (string) ($state['stat'] ?? 'guest'),
        ];

        foreach (['tenant', 'app'] as $key) {
            $value = $request->query($key);
            if ($value !== null && $value !== '') {
                $embedQuery[$key] = $value;
            }
        }

        $ctx = $request->query('ctx');
        if (is_array($ctx) && $ctx !== []) {
            $embedQuery['ctx'] = $ctx;
        }

        return view('vm-osjs::portal', [
            'embedUrl' => route($embedRoute, $embedQuery),
            'state' => $state,
        ]);
    }
}
