<?php

declare(strict_types=1);

namespace App\Foundation\Abstracts;

abstract class BaseFactory
{
    abstract public function create(array $extra = []);

    public function times(int $times, array $extra = [])
    {
        return collect()->times($times)->map(fn () => $this->create($extra));
    }
}
