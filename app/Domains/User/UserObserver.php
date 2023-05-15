<?php

declare(strict_types=1);

namespace App\Domains\User;

use App\Data\Models\User;

class UserObserver
{
    /**
     * Summary of saving
     *
     * @param  User  $user
     * @return void
     */
    public function saving(User $user): void
    {
    }
}
