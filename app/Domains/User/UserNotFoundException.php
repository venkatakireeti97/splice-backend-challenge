<?php

declare(strict_types=1);

namespace App\Domains\User;

use App\Exceptions\DomainException\DomainRecordNotFoundException;

class UserNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The user you requested does not exist.';
}
