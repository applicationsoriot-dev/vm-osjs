<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VmEmbedController
{
    public function __invoke(Request $request): View
    {
        $stage = (string) $request->query('stage', 'guest');
        return view('vm-osjs::embed', [
            'stage' => $stage,
            'baseUrl' => rtrim($request->getSchemeAndHttpHost(), '/'),
        ]);
    }
}
