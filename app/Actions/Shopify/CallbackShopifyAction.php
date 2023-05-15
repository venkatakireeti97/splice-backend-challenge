<?php

declare(strict_types=1);

namespace App\Actions\Shopify;

use Illuminate\Support\Facades\Config;
use Shopify\Utils;
use Shopify\Webhooks\Registry;
use Shopify\Webhooks\Topics;

class CallbackShopifyAction extends ShopifyAction
{
    /**
     * {@inheritdoc}
     */
    public function handle($session, $host, $shopUrl): String
    {
        $shop = Utils::sanitizeShopDomain($shopUrl);

        $response = Registry::register('/api/webhooks', Topics::APP_UNINSTALLED, $shop, $session->getAccessToken());
        if ($response->isSuccess()) {
            $this->logger->debug("Registered APP_UNINSTALLED webhook for shop $shop");
        } else {
            $this->logger->error("Failed to register APP_UNINSTALLED webhook for shop $shop with response body: " . print_r($response->getBody(), true));
        }

        $redirectUrl = Utils::getEmbeddedAppUrl($host);
        if (Config::get('shopify.billing.required')) {
            list($hasPayment, $confirmationUrl) = EnsureBilling::check($session, Config::get('shopify.billing'));

            if (!$hasPayment) {
                $redirectUrl = $confirmationUrl;
            }
        }

        return $redirectUrl;
    }
}
