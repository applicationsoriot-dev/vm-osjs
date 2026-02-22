<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Support;

use Geodit\VmOsjs\Contracts\VmActorResolverInterface;
use Illuminate\Http\Request;

class VmStateResolver
{
    public function __construct(private readonly VmActorResolverInterface $actorResolver)
    {
    }

    /** @return array{stage:string,stat:string} */
    public function resolve(Request $request): array
    {
        $requested = strtolower((string) $request->query('stat', ''));
        if ($requested === 'log') {
            $requested = 'auth';
        }

        if (! in_array($requested, ['guest', 'auth', 'tenant'], true)) {
            $requested = $this->actorResolver->hasActor($request) ? 'auth' : 'guest';
        }

        if (! $this->actorResolver->hasActor($request) && $requested !== 'guest') {
            $requested = 'guest';
        }

        return ['stage' => $requested, 'stat' => $requested === 'auth' ? 'log' : $requested];
    }
}
