<?php

use Geodit\VmOsjs\Http\Controllers\VmEmbedController;
use Geodit\VmOsjs\Http\Controllers\VmLogoutController;
use Geodit\VmOsjs\Http\Controllers\VmPortalController;
use Illuminate\Support\Facades\Route;

$path = trim((string) config('vm_osjs.path', 'vm'), '/');
$path = $path !== '' ? $path : 'vm';

Route::get('/' . $path, VmPortalController::class)->name(config('vm_osjs.route_names.portal', 'vm.osjs.portal'));
Route::get('/' . $path . '/embed', VmEmbedController::class)->name(config('vm_osjs.route_names.embed', 'vm.osjs.embed'));
Route::post('/' . $path . '/logout', VmLogoutController::class)->name(config('vm_osjs.route_names.logout', 'vm.osjs.logout'));
