<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Adapters\Null;

use Geodit\VmOsjs\Contracts\VmActorResolverInterface;
use Illuminate\Http\Request;

class NullVmActorResolver implements VmActorResolverInterface
{
    public function hasActor(Request $request): bool
    {
        return false;
    }
}
