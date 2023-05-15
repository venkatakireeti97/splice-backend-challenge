<?php

namespace App\Services;

use App\Actions\Shopify\CallbackShopifyAction;
use App\Actions\Shopify\InstallShopifyAction;
use App\Data\Repositories\ShopifyRepository;
use Illuminate\Http\Request;
use Shopify\Auth\OAuth;

class ShopifyService
{
    public function __construct(protected ShopifyRepository $shopifyRepository)
    {
    }

    public function install(Request $request)
    {
        return InstallShopifyAction::run($request->route("shop"));
    }

    public function callback(Request $request)
    {
        $session = OAuth::callback(
            $request->cookie(),
            $request->query(),
            'App\Foundation\Supports\CookieHandler::saveShopifyCookie',
        );

        $host = $request->route('host');
        
        $shopUrl = $request->route('shop');

        return CallbackShopifyAction::run($session, $host, $shopUrl);
    }
}
