<?php

declare(strict_types=1);

namespace Geodit\VmOsjs\Contracts;

use Illuminate\Http\Request;

interface VmLogoutHandlerInterface
{
    public function logout(Request $request): void;
}
