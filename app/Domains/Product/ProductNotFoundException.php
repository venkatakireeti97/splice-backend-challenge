<?php

declare(strict_types=1);

namespace App\Domains\Product;

use App\Exceptions\DomainException\DomainRecordNotFoundException;

class ProductNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The user you requested does not exist.';
}
