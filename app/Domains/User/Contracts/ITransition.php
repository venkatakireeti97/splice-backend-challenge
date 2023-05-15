<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts;

use App\Data\Models\User;

interface ITransition
{
    /**
     * @throws \Exception
     */
    public function execute(User $user): User;
}
