<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Adapters\Null;

use Geodit\VmOsjs\Contracts\VmTenantProviderInterface;
use Illuminate\Http\Request;

class NullVmTenantProvider implements VmTenantProviderInterface
{
    public function tenants(Request $request): array
    {
        return [];
    }
}
