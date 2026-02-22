<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Contracts;

use Illuminate\Http\Request;

interface VmTenantProviderInterface
{
    /** @return array<int,array{id:int,name:string,url:string}> */
    public function tenants(Request $request): array;
}
