<?php

use Geodit\VmOsjs\Http\Controllers\VmEmbedController;
use Geodit\VmOsjs\Http\Controllers\VmLogoutController;
use Geodit\VmOsjs\Http\Controllers\VmPortalController;
use Illuminate\Support\Facades\Route;

$path = trim((string) config('vm_osjs.path', 'vm'), '/');
$path = $path !== '' ? $path : 'vm';
$osjsBasePath = trim((string) config('vm_osjs.osjs_base_url', '/osjs'), '/');
$osjsBasePath = $osjsBasePath !== '' ? $osjsBasePath : 'osjs';
$osjsDistPath = realpath(__DIR__ . '/../osjs/dist');

$serveOsjsAsset = static function (string $path) use ($osjsDistPath) {
    if (! $osjsDistPath) {
        abort(404);
    }

    $relativePath = ltrim($path, '/\\');
    if ($relativePath === '' || preg_match('#(^|[\\\\/])\\.\\.([\\\\/]|$)#', $relativePath)) {
        abort(404);
    }

    $file = $osjsDistPath . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);
    if (! is_file($file)) {
        abort(404);
    }

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $mime = match ($ext) {
        'css' => 'text/css; charset=UTF-8',
        'js', 'mjs' => 'application/javascript; charset=UTF-8',
        'json', 'map' => 'application/json; charset=UTF-8',
        'png' => 'image/png',
        'svg' => 'image/svg+xml',
        'jpg', 'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
        default => null,
    };

    return $mime
        ? response()->file($file, ['Content-Type' => $mime])
        : response()->file($file);
};

Route::get('/' . $path, VmPortalController::class)->name(config('vm_osjs.route_names.portal', 'vm.osjs.portal'));
Route::get('/' . $path . '/embed', VmEmbedController::class)->name(config('vm_osjs.route_names.embed', 'vm.osjs.embed'));
Route::post('/' . $path . '/logout', VmLogoutController::class)->name(config('vm_osjs.route_names.logout', 'vm.osjs.logout'));
Route::get('/' . $osjsBasePath . '/{path}', $serveOsjsAsset)->where('path', '.*')->name('vm.osjs.assets');
Route::get('/metadata.json', static fn () => $serveOsjsAsset('metadata.json'))->name('vm.osjs.metadata');
Route::get('/' . $path . '/embed/{path}', $serveOsjsAsset)->where('path', '.*')->name('vm.osjs.embed.assets');
