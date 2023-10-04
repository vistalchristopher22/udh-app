<?php

namespace App\Pipes;

use Closure;

abstract class BasePipeHandler
{
    abstract public function handle(array $payload, Closure $next);
}
