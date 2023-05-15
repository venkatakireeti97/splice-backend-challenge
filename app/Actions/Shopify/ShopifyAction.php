<?php

declare(strict_types=1);

namespace App\Actions\Shopify;

use App\Domains\Shopify\Contracts\IShopifyRepository;
use App\Foundation\Abstracts\Action\BaseAction;
use Psr\Log\LoggerInterface;

abstract class ShopifyAction extends BaseAction
{
    protected IShopifyRepository $shopifyRepository;

    public function __construct(LoggerInterface $logger, IShopifyRepository $shopifyRepository)
    {
        parent::__construct($logger);
        $this->shopifyRepository = $shopifyRepository;
    }
}
