<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Adapters\Null;

use Geodit\VmOsjs\Contracts\VmLogoutHandlerInterface;
use Illuminate\Http\Request;

class NullVmLogoutHandler implements VmLogoutHandlerInterface
{
    public function logout(Request $request): void
    {
    }
}
