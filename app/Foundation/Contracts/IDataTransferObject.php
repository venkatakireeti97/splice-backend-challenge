<?php

declare(strict_types=1);

namespace App\Foundation\Contracts;

interface IDataTransferObject
{
    /**
     * Summary of fromArray
     *
     * @param  array  $attributes
     * @return IDataTransferObject
     */
    public static function fromArray(array $attributes): self;
}
