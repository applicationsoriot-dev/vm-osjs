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
        $osjsBaseUrl = '/' . trim((string) config('vm_osjs.osjs_base_url', '/osjs'), '/');
        $assetBasePath = realpath(__DIR__ . '/../../../osjs/dist') ?: (__DIR__ . '/../../../osjs/dist');

        $vendorsJsV = @filemtime($assetBasePath . '/vendors~osjs.js') ?: time();
        $osjsJsV = @filemtime($assetBasePath . '/osjs.js') ?: time();
        $vendorsCssV = @filemtime($assetBasePath . '/vendors~osjs.css') ?: time();
        $osjsCssV = @filemtime($assetBasePath . '/osjs.css') ?: time();

        return view('vm-osjs::embed', [
            'stage' => $stage,
            'baseUrl' => rtrim($request->getSchemeAndHttpHost(), '/'),
            'osjsBaseUrl' => rtrim($osjsBaseUrl, '/'),
            'vendorsJsV' => $vendorsJsV,
            'osjsJsV' => $osjsJsV,
            'vendorsCssV' => $vendorsCssV,
            'osjsCssV' => $osjsCssV,
        ]);
    }
}
