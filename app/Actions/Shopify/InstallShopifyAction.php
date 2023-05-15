<?php

declare(strict_types=1);

namespace App\Actions\Shopify;

use App\Data\Models\Session;
use Shopify\Utils;

class InstallShopifyAction extends ShopifyAction
{
    /**
     * {@inheritdoc}
     */
    public function handle(string $shopUrl): string
    {
        $shop = Utils::sanitizeShopDomain($shopUrl);

        // Delete any previously created OAuth sessions that were not completed (don't have an access token)
        Session::where('shop', $shop)->where('access_token', null)->delete();

        $this->logger->info("Shopify app : {$shopUrl} was sanitized");

        return $shop;
    }
}