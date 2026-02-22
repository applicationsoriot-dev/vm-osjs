<?php

return [
    'path' => env('VM_PATH', 'vm'),
    'route_names' => [
        'portal' => 'vm.osjs.portal',
        'embed' => 'vm.osjs.embed',
        'logout' => 'vm.osjs.logout',
    ],
    'osjs_base_url' => env('VM_OSJS_BASE_URL', '/osjs'),
    'adapters' => [
        'actor' => \Geodit\VmOsjs\Adapters\Null\NullVmActorResolver::class,
        'tenant' => \Geodit\VmOsjs\Adapters\Null\NullVmTenantProvider::class,
        'logout' => \Geodit\VmOsjs\Adapters\Null\NullVmLogoutHandler::class,
    ],
];
