<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Contracts;

use Illuminate\Http\Request;

interface VmActorResolverInterface
{
    public function hasActor(Request $request): bool;
}
